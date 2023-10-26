<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        {{-- use ml-8 space-x-8 SET space --}}
        <div class="ml-8 space-x-8">

            {{-- Index --}}
            <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                {{ __('Index') }}
            </x-nav-link>

            {{-- Create --}}
            <x-nav-link href="{{ route('categories.create') }}" :active="request()->routeIs('categories.create')">
                {{ __('Create') }}
            </x-nav-link>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
