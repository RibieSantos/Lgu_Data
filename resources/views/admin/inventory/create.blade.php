<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg min-h-screen p-6">

                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-primary"> Add Inventory Item </h1>
                        <p class="text-muted mt-1"> Register a new inventory item. </p>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-surface border border-border rounded-xl shadow">
                    <form action="{{ route('inventory.store', ['id' => $employee->id]) }}" method="POST"
                        enctype="multipart/form-data" class="p-8">
                        @csrf



                        <h2 class="text-xl font-bold text-primary mb-5"> Inventory Information </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <input type="text" name="employee_id" value="{{ $employee->id }}" hidden>

                            <!-- Item Title -->
                            <div>
                                <label class="font-semibold text-text"> Item Title </label>
                                <input type="text" name="item_title" placeholder="Item Title" value="{{ old('item_title') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('item_title')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>
                            <!-- ICS No -->
                            <div>
                                <label class="font-semibold text-text"> ICS No </label>
                                <input type="text" name="ics_no" placeholder="ex. 0000-0000-000-000" value="{{ old('ics_no') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('ics_no')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- serial_no -->
                            <div>
                                <label class="font-semibold text-text">
                                    Serial No.
                                </label>
                                <input type="text" name="serial_no" placeholder="Serial Number"
                                    value="{{ old('serial_no') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                            </div>
                        </div>

                        <!-- Acquired Date -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <label> Acquired Date </label>
                                <input type="date" name="acquired_date"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                                @error('acquired_date')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- Quantity -->
                            <div>
                                <label> Quantity</label>
                                <input type="text" name="qty" placeholder="Quantity" value="{{ old('qty') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                                @error('qty')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div class="md:col-span-2 ">
                                <label> Description </label>
                                <textarea name="description" rows="3"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3"></textarea>
                                @error('description')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end gap-3 mt-8"> <a
                                href="{{ route('employees.index', $employee->id) }}"
                                class="px-6 py-3 rounded-lg border border-border hover:bg-gray-100"> Cancel </a> <button
                                type="submit"
                                class="px-6 py-3 rounded-lg bg-secondary hover:bg-secondary-hover text-white shadow">
                                Save Inventory </button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>