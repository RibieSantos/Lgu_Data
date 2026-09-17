<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            {{ __('Inventory Document') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-border">

                    <!-- Profile Card -->
                    <div class="bg-surface border border-border rounded-xl shadow p-6 mb-6">
                        <div class="flex flex-col md:flex-row items-center gap-6">
                            <!-- Image -->
                            <img src="{{ asset('storage/' . $inventoryDocument->accountablePerson->employee_image) }}"
                                class="w-52 h-52 rounded-full object-cover border-4 border-secondary-light">
                            <div>
                                <div>
                                    <h2 class="text-5xl font-bold text-primary">
                                        {{ $inventoryDocument->accountablePerson->first_name }}
                                        {{ $inventoryDocument->accountablePerson->middle_name }}
                                        {{ $inventoryDocument->accountablePerson->last_name }}
                                    </h2>
                                    <h2 class="text-lg font-semibold text-primary">
                                        Document No.: {{ $inventoryDocument->document_no }}
                                    </h2>
                                    <h2 class="text-lg font-semibold text-primary">
                                        Document Type: {{ $inventoryDocument->document_type }}
                                    </h2>
                                    <h2 class="text-lg font-semibold text-primary">
                                        Date Issued: {{ $inventoryDocument->document_date }}
                                    </h2>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div>
                        <div>
                            <h2 class="text-lg font-semibold text-primary">
                                Inventory Items:
                            </h2>
                        </div>
                        <div class="overflow-x-auto mt-4">
                            <a href="{{ route('inventory-items.create', $inventoryDocument->id) }}"
                            class="mt-4 sm:mt-0 bg-secondary hover:bg-secondary-hover text-white px-5 py-2.5 rounded-lg shadow transition">

                            + Add Inventory Item

                        </a>
                            <table class="w-full text-sm text-left text-text">
                                <thead class="text-xs text-text uppercase bg-bg border-b border-border">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Item Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Category
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Quantity
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Unit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Cost
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventoryItems as $item)
                                    @if ($inventoryDocument->id == $item->id)
                                        <tr class="bg-white border-b border-border hover:bg-green-50 transition">
                                            <td class="px-6 py-4">
                                                {{ $item->item_name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->category->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->quantity }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->unit }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->unit_cost }}
                                            </td>
                                        </tr>
                                    @endif
                                        
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>