<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg min-h-screen p-6">

                <!-- Header -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-primary">
                            Add Category
                        </h1>
                        <p class="text-muted mt-1">
                            Create a new category for the Local Government Unit.
                        </p>
                    </div>

                    
                </div>

                <!-- Card -->
                <div class="bg-surface rounded-xl shadow border border-border max-w-3xl">

                    <form action="{{ route('categories.store') }}" method="POST" class="p-8">

                        @csrf

                        <!-- Category Name -->
                        <div class="mb-6">
                            <label class="block mb-2 font-semibold text-text">
                                Category Name
                            </label>

                            <input type="text" name="name" value="{{ old('name') }}"
                                placeholder="e.g. Laptop, Desktop, Printer, etc."
                                class="w-full rounded-lg border border-border focus:border-primary focus:ring-2 focus:ring-primary/20 px-4 py-3 outline-none">

                            @error('name')
                                <p class="text-error text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        

                        <!-- Description -->
                        <div class="mb-8">
                            <label class="block mb-2 font-semibold text-text">
                                Description
                            </label>

                            <textarea name="description" rows="5" placeholder="Enter department description..."
                                class="w-full rounded-lg border border-border focus:border-primary focus:ring-2 focus:ring-primary/20 px-4 py-3 outline-none resize-none">{{ old('description') }}</textarea>

                            @error('description')
                                <p class="text-error text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end gap-3">

                            <a href="{{ route('departments.index') }}"
                                class="px-5 py-2.5 rounded-lg border border-border hover:bg-gray-100 transition">
                                Cancel
                            </a>

                            <button type="submit"
                                class="px-6 py-2.5 rounded-lg bg-secondary hover:bg-secondary-hover text-white font-medium transition shadow">

                                Save Department

                            </button>

                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>