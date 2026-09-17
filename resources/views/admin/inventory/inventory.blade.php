<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-bg min-h-screen p-6">

                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">

                        <div>
                            <h1 class="text-3xl font-bold text-primary">
                                Inventory Management
                            </h1>

                            <p class="text-muted mt-1">
                                Manage LGU inventory and items.
                            </p>
                        </div>


                        <a href="{{ route('employees.create') }}"
                            class="mt-4 sm:mt-0 bg-secondary hover:bg-secondary-hover text-white px-5 py-2.5 rounded-lg shadow transition">

                            + Add Employee

                        </a>

                    </div>


                    <!-- Table Card -->
                    <div class="bg-surface border border-border rounded-xl shadow overflow-hidden">


                        <div class="overflow-x-auto">
                            <div class="relative overflow-x-auto bg-white shadow-lg rounded-xl border border-border">
                                <!-- Top Toolbar -->
                                <div class="p-5 flex flex-col md:flex-row items-center justify-between gap-4">
                                    <form action="{{ route('inventory.index') }}" method="GET">
                                        <div class="flex items-center justify-between">
                                            <div class="p-4 flex flex-col md:flex-row items-center justify-between gap-3">

                                                <!-- Search -->
                                                <div class="relative w-full md:w-96">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                        <svg class="w-5 h-5 text-muted" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2"
                                                            d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 6 6a7.5 7.5 0 0 0 10.65 10.65Z"/>
                                                        </svg>
                                                    </div>
                                                    <input 
                                                        type="text"
                                                        name="search"
                                                        value="{{ request('search') }}"
                                                        placeholder="Search employee..."
                                                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-border rounded-lg text-text focus:ring-2 focus:ring-secondary"
                                                    >
                                                </div>
                                                <button 
                                                    type="submit"
                                                    class="bg-primary text-white px-4 py-2.5 rounded-lg">
                                                    Search
                                                </button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                    
                                </div>
                                <!-- Table -->
                                <table class="w-full text-sm text-left text-text">
                        <!-- Header -->
                        <thead class=" text-sm text-white bg-primary uppercase ">
                            <tr>
                                <th class="px-6 py-4">
                                    Accountable Officer
                                </th>
                                <th class="px-6 py-4">
                                    Item Title
                                </th>
                                <th class="px-6 py-4">
                                    ICS No.
                                </th>
                                <th class="px-6 py-4">
                                    Serial No.
                                </th>
                                <th class="px-6 py-4">
                                    Description
                                </th>
                                <th class="px-6 py-4">
                                    Quantity
                                </th>
                                <th class="px-6 py-4 text-center">
                                    Acquired Date
                                </th>

                                <th class="px-6 py-4 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory as $inv)
                            <tr class=" bg-white border-b border-border hover:bg-green-50 transition ">

                                
                                        <td class="px-6 py-4 font-medium">
                                            {{ $inv->employee->first_name ?? 'N/A' }} {{ $inv->employee->middle_name }} {{ $inv->employee->last_name ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 font-medium">
                                            {{ $inv->item_title ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 font-medium">
                                            {{ $inv->ics_no ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 font-medium">
                                            {{ $inv->serial_no ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 font-medium">
                                            {{ $inv->description ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 font-medium">
                                            {{ $inv->qty ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-center">
                                            {{ \Carbon\Carbon::parse($inv->acquired_date)->format('F d, Y') ?? 'N/A' }}
                                        </td>

                                   
                                

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                                <div class="m-4">
    {{ $inventory->links() }}
</div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>