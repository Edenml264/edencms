<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Media') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data"
                          x-data="{ initFilePond() { 
                            FilePond.create(this.$refs.filepond, {
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
                                labelIdle: 'Drag & Drop your files or <span class=\"filepond--label-action\">Browse</span>'
                            });
                          }}"
                          x-init="initFilePond">
                        @csrf
                        <input type="file" x-ref="filepond" class="filepond" name="file" multiple>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
