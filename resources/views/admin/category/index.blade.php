<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Items') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-bg min-h-screen p-6">

                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-primary">
                                Category Management
                            </h1>
                            <p class="text-muted mt-1">
                                Manage all LGU categories.
                            </p>
                        </div>

                        <a href="{{ route('categories.create') }}"
                            class="mt-4 sm:mt-0 inline-flex items-center gap-2 bg-secondary hover:bg-secondary-hover text-white px-5 py-2.5 rounded-lg shadow transition">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>

                            Add Category
                        </a>
                    </div>

                    <!-- Card -->
                    <div class="bg-surface rounded-xl shadow border border-border overflow-hidden">

                        <div class="overflow-x-auto">

                            <table class="w-full text-sm">

                                <thead class="bg-primary text-white">

                                    <tr>
                                        <th class="px-6 py-4 text-left font-semibold">
                                            #
                                        </th>

                                        <th class="px-6 py-4 text-left font-semibold">
                                            Category Name
                                        </th>
                                        

                                        <th class="px-6 py-4 text-left font-semibold">
                                            Description
                                        </th>

                                        <th class="px-6 py-4 text-center font-semibold w-48">
                                            Actions
                                        </th>

                                    </tr>

                                </thead>

                                <tbody class="divide-y divide-border">

                                    @forelse($categories as $category)

                                        <tr class="hover:bg-secondary-light transition">

                                            <td class="px-6 py-4">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="px-6 py-4 font-semibold text-text">
                                                {{ $category->name }}
                                            </td>

                                            <td class="px-6 py-4 text-muted">
                                                {{ $category->description }}
                                            </td>

                                            <td class="px-6 py-4">

                                                <div class="flex justify-center gap-2">

                                                    <!-- Edit -->
                                                    <a href="{{ route('categories.edit', $category->id) }}"
                                                        class="bg-info hover:bg-primary text-white px-3 py-2 rounded-lg transition">

                                                        Edit
                                                    </a>

                                                    <!-- Delete -->
                                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                                        method="POST" onsubmit="return confirm('Delete this category?')">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            class="bg-error hover:bg-red-700 text-white px-3 py-2 rounded-lg transition">

                                                            Delete

                                                        </button>

                                                    </form>

                                                </div>

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="4" class="py-12 text-center text-muted">

                                                No categories found.

                                            </td>

                                        </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>