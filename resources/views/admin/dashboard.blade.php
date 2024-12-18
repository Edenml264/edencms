<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Welcome to EdenCMS') }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Widgets del Dashboard -->
                        <div class="p-4 bg-blue-100 rounded-lg">
                            <h4 class="font-semibold">{{ __('Pages') }}</h4>
                            <p class="text-2xl">0</p>
                        </div>
                        <div class="p-4 bg-green-100 rounded-lg">
                            <h4 class="font-semibold">{{ __('Media Files') }}</h4>
                            <p class="text-2xl">0</p>
                        </div>
                        <div class="p-4 bg-yellow-100 rounded-lg">
                            <h4 class="font-semibold">{{ __('Forms') }}</h4>
                            <p class="text-2xl">0</p>
                        </div>
                        <div class="p-4 bg-purple-100 rounded-lg">
                            <h4 class="font-semibold">{{ __('Templates') }}</h4>
                            <p class="text-2xl">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
