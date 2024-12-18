<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Media Gallery') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Upload Section -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Upload Media') }}</h3>
                        <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div x-data="{ pond: null }" 
                                x-init="pond = FilePond.create($refs.filepond, {
                                    server: {
                                        process: {
                                            url: '{{ route('admin.media.store') }}',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            }
                                        }
                                    },
                                    allowMultiple: true,
                                    acceptedFileTypes: ['image/*'],
                                    labelIdle: 'Drag & Drop your files or Browse'
                                })">
                                <input type="file" x-ref="filepond" class="filepond" name="filepond" multiple>
                            </div>
                        </form>
                    </div>

                    <!-- Gallery Section -->
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @forelse ($media as $item)
                            <div class="relative group">
                                @if (Str::startsWith($item->mime_type, 'image/'))
                                    <img src="{{ Storage::url($item->path) }}" 
                                         alt="{{ $item->alt }}" 
                                         class="w-full h-48 object-cover rounded-lg">
                                @else
                                    <div class="w-full h-48 flex items-center justify-center bg-gray-100 rounded-lg">
                                        <span class="text-gray-500">{{ $item->mime_type }}</span>
                                    </div>
                                @endif
                                
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                                    <div class="hidden group-hover:flex space-x-2">
                                        <button onclick="copyToClipboard('{{ Storage::url($item->path) }}')"
                                                class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path>
                                            </svg>
                                        </button>
                                        
                                        <form action="{{ route('admin.media.destroy', $item) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="mt-2">
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ $item->name }}</p>
                                    <p class="text-sm text-gray-500">{{ human_filesize($item->size) }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center text-gray-500">
                                {{ __('No media files uploaded yet.') }}
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $media->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('URL copied to clipboard!');
            });
        }
    </script>
    @endpush
</x-app-layout>