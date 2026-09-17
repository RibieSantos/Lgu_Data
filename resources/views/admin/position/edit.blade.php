<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Position') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg min-h-screen p-6">

                <!-- Header -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-primary">
                            Edit Position
                        </h1>
                        <p class="text-muted mt-1">
                            Update the position information for the Local Government Unit.
                        </p>
                    </div>

                    
                </div>

                <!-- Card -->
                <div class="bg-surface rounded-xl shadow border border-border max-w-3xl">

                    <form action="{{ route('position.update', $position->id) }}" method="POST" class="p-8">

                        @csrf
                        @method('PUT')

                        <!-- Position Name -->
                        <div class="mb-6">
                            <label class="block mb-2 font-semibold text-text">
                                Position Name
                            </label>

                            <input type="text" name="position_name" value="{{ old('position_name', $position->position_name) }}"
                                placeholder="e.g. Human Resource Management Office"
                                class="w-full rounded-lg border border-border focus:border-primary focus:ring-2 focus:ring-primary/20 px-4 py-3 outline-none">

                            @error('position_name')
                                <p class="text-error text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Position Code -->
                        <div class="mb-6">
                            <label class="block mb-2 font-semibold text-text">
                                Position Code
                            </label>

                            <input type="text" name="position_code" value="{{ old('position_code', $position->position_code) }}"
                                placeholder="e.g. HRM"
                                class="w-full rounded-lg border border-border focus:border-primary focus:ring-2 focus:ring-primary/20 px-4 py-3 outline-none">

                            @error('position_code')
                                <p class="text-error text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-8">
                            <label class="block mb-2 font-semibold text-text">
                                Description
                            </label>

                            <textarea name="description" rows="5" placeholder="Enter position description..."
                                class="w-full rounded-lg border border-border focus:border-primary focus:ring-2 focus:ring-primary/20 px-4 py-3 outline-none resize-none">{{ old('description', $position->description) }}</textarea>

                            @error('description')
                                <p class="text-error text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end gap-3">

                            <a href="{{ route('position.index') }}"
                                class="px-5 py-2.5 rounded-lg border border-border hover:bg-gray-100 transition">
                                Cancel
                            </a>

                            <button type="submit"
                                class="px-6 py-2.5 rounded-lg bg-secondary hover:bg-secondary-hover text-white font-medium transition shadow">

                                Save Position

                            </button>

                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>