<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg min-h-screen p-6">

                <!-- ANCHOR Header -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-primary"> Add Inventory Item </h1>
                        <p class="text-muted mt-1"> Register a new inventory item. </p>
                    </div>
                </div>

                <!-- ANCHOR Form Card -->
                <div class="bg-surface border border-border rounded-xl shadow">
                    <form action="{{ route('inventory-items.store', ['id' => $inventoryDocument->id]) }}" method="POST"
                        enctype="multipart/form-data" class="p-8">
                        @csrf

                        <h2 class="text-xl font-bold text-primary mb-5"> Inventory Information </h2>

                        <!-- ANCHOR column 1-->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- ANCHOR Inventory Document ID -->
                            <input type="text" name="inventory_document_id" value="{{ $inventoryDocument->id }}" hidden>


                            <!-- ANCHOR Property No -->
                            <div>
                                <label class="font-semibold text-text"> Property No </label>
                                <input type="text" name="property_no" placeholder="ex. 0000-0000-000-000"
                                    value="{{ old('property_no') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('ics_no')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- ANCHOR inventory_item_no -->
                            <div>
                                <label class="font-semibold text-text">
                                    Inventory Item No.
                                </label>
                                <input type="text" name="inventory_item_no" placeholder="Item Number"
                                    value="{{ old('inventory_item_no') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                                @error('inventory_item_no')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- ANCHOR serial_no -->
                            <div>
                                <label class="font-semibold text-text">
                                    Serial No.
                                </label>
                                <input type="text" name="serial_no" placeholder="Serial Number"
                                    value="{{ old('serial_no') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                                @error('serial_no')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- ANCHOR column 2 -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-6 gap-6">
                            <!-- ANCHOR Item Title -->
                            <div>
                                <label class="font-semibold text-text"> Item Title </label>
                                <input type="text" name="item_title" placeholder="Item Title"
                                    value="{{ old('item_title') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('item_title')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- ANCHOR category -->
                            <div>
                                <label class="font-semibold text-text"> Category </label>
                                <select name="category_id" id=""
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                    <option value="">---Select Category---</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            
                            <!-- ANCHOR Unit -->
                            <div>
                                <label class="font-semibold text-text"> Unit </label>
                                <input type="text" name="unit" placeholder="Ex. pcs, box, etc." value="{{ old('unit') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('unit')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- ANCHOR column 3 -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-6 gap-6">
                            <!-- ANCHOR ANCHOR Unit Cost -->
                            <div>
                                <label class="font-semibold text-text"> Unit Cost </label>
                                <input type="number" step="0.01" name="unit_cost" id="unit_cost"
                                    placeholder="Ex. 200.00" value="{{ old('unit_cost') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('unit_cost')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- ANCHOR Quantity -->
                            <div>
                                <label class="font-semibold text-text"> Quantity </label>
                                <input type="number" name="qty" id="qty" placeholder=""
                                    value="{{ old('qty') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('qty')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- ANCHOR total cost -->
                            <div>
                                <label class="font-semibold text-text"> Total Cost </label>
                                <input type="number" name="total_cost" id="total_cost" step="0.01"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary"
                                    readonly>
                            </div>
                        </div>


                        <!-- ANCHOR column 3 -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-6 gap-6">
                            <!-- ANCHOR Acquired Date -->
                            <div>
                                <label class="font-semibold text-text"> Acquired Date </label>
                                <input type="date" name="acquired_date"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                                @error('acquired_date')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- ANCHOR Disposal Date -->
                            <div>
                                <label class="font-semibold text-text"> Disposal Date </label>
                                <input type="date" name="disposal_date"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                                @error('disposal_date')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- ANCHOR Estimated Useful Life -->
                            <div>
                                <label class="font-semibold text-text"> Estimated Useful Life </label>
                                <input type="text" name="estimated_life" placeholder="Ex. 5 years, etc."
                                    value="{{ old('estimated_life') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('estimated_life')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- ANCHOR Status -->
                            <div>
                                <label class="font-semibold text-text"> Status </label>
                                <select name="" id=""
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                    <option value="">--- Select Status ---</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>



                        <!-- ANCHOR Description -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div class="md:col-span-2 ">
                                <label class="font-semibold text-text"> Description </label>
                                <textarea name="description" rows="3"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3"></textarea>
                                @error('description')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        <!-- ANCHOR Buttons -->
                        <div class="flex justify-end gap-3 mt-8"> <a
                                href="{{ route('inventory-documents.show', $inventoryDocument->id) }}"
                                class="px-6 py-3 rounded-lg border border-border hover:bg-gray-100"> Cancel </a> <button
                                type="submit"
                                class="px-6 py-3 rounded-lg bg-secondary hover:bg-secondary-hover text-white shadow">
                                Save Inventory </button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const qty = document.getElementById('qty');
        const unit_cost = document.getElementById('unit_cost');
        const total_cost = document.getElementById('total_cost');

        function calculateTotal() {
            const value1 = parseFloat(qty.value) || 0;
            const value2 = parseFloat(unit_cost.value) || 0;

            total_cost.value = value1 * value2;
        }

        qty.addEventListener('input', calculateTotal);
        unit_cost.addEventListener('input', calculateTotal);
    </script>
    {{--
    <script>
        const qty = document.getElementById('qty');
        const unit_cost = document.getElementById('unit_cost');
        const total_cost = document.getElementById('total_cost');

        function calculateTotal() {
            const value1 = parseFloat(qty.value) || 0;
            const value2 = parseFloat(unit_cost.value) || 0;

            total_cost.value = value1 * value2;
        }

        qty.addEventListener('input', calculateTotal);
        unit_cost.addEventListener('input', calculateTotal);
    </script> --}}
</x-app-layout>