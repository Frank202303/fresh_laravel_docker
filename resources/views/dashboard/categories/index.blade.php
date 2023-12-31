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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-ui.alert />

    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="font-bold text-gray-500  bg-indigo-200">

                        <tr>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase"></th>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">ID</th>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">Name</th>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">Subcatogeries</th>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">Created at</th>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">Updated at</th>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">Action</th>
                        </tr>

                    </thead>
                    <tbody class="text-xs divide-y divide-gray-200  bg-indigo-50">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-2 py-4 whitespace-nowrap"></td>
                                <td class="px-2 py-4 whitespace-nowrap">{{ $category->id }}</td>
                                <td class="px-2 py-4 whitespace-nowrap">{{ $category->name }}</td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    <ul>[@foreach ($category->subCategories as $subCategory)
                                            <li>{{ $subCategory->name }}, </li>
                                        @endforeach]
                                    </ul>
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">{{ $category->created_at }}</td>
                                <td class="px-2 py-4 whitespace-nowrap">{{ $category->updated_at }}</td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        {{-- use route('categories.edit' :   open the EDIT PAGE --}}
                                        <a href="{{ route('categories.edit', $category) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>

                                        {{-- The GET method is not supported for route dashboard/categories/reading789/delete. Supported methods: DELETE. --}}
                                        {{-- MUST use : form method="POST"  --}}
                                        <form method="POST" action='{{ route('categories.delete', $category) }}'>
                                            @csrf
                                            @method('DELETE')
                                            {{-- Must use button --}}
                                            {{-- add STYLEs For button --}}
                                            <button type="submit" class="p-1  border-2 border-red-200 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6  text-red-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>

                                            </button>



                                        </form>
                                    </div>


                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
