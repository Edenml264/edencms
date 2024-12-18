<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $page->title)" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="layout" :value="__('Layout')" />
                                <select id="layout" name="layout" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="default" {{ $page->layout === 'default' ? 'selected' : '' }}>Default</option>
                                    <option value="full-width" {{ $page->layout === 'full-width' ? 'selected' : '' }}>Full Width</option>
                                    <option value="sidebar" {{ $page->layout === 'sidebar' ? 'selected' : '' }}>With Sidebar</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('layout')" />
                            </div>

                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="draft" {{ $page->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ $page->status === 'published' ? 'selected' : '' }}>Published</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('status')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Update Page') }}</x-primary-button>
                                <a href="{{ route('admin.pages.index') }}" class="text-gray-600 hover:text-gray-900">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
