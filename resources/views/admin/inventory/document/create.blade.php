<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory Documents') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg min-h-screen p-6">

                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-primary"> Add Inventory Document </h1>
                        <p class="text-muted mt-1"> Register a new inventory document. </p>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-surface border border-border rounded-xl shadow">
                    <form action="{{ route('inventory-documents.store') }}" method="POST" enctype="multipart/form-data"
                        class="p-8">
                        @csrf



                        <h2 class="text-xl font-bold text-primary mb-5"> Inventory Documents Information </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                            <!-- Document Type -->
                            <div>
                                <label class="font-semibold text-text"> Document Type </label>
                                <select name="document_type"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                    <option value="">Select Document Type</option>
                                    <option value="ICS" {{ old('document_type') == 'ICR' ? 'selected' : '' }}>Inventory
                                        Custodian Slip</option>
                                    <option value="PAR" {{ old('document_type') == 'PAR' ? 'selected' : '' }}>Property
                                        Acknowledgment Receipt</option>
                                </select>
                                @error('document_type')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- Document No -->
                            <div>
                                <label class="font-semibold text-text"> Document No </label>
                                <input type="text" name="document_no" placeholder="ex. 0000-0000-000-000"
                                    value="{{ old('document_no') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('document_no')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- Fund -->
                            <div>
                                <label class="font-semibold text-text"> Fund </label>
                                <input type="text" name="fund" placeholder="ex. 100" value="{{ old('fund') }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('fund')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <!-- Accountable Person -->
                            <div x-data="{ open: false, search: '', selected: '' }" class="relative">

                                <label class="font-semibold text-text">
                                    Accountable Person
                                </label>

                                <!-- Search Input -->
                                <input type="text" x-model="search" @click="open = true"
                                    placeholder="Search for an employee" autocomplete="off"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">

                                <!-- Dropdown -->
                                <div x-show="open" @click.away="open = false"
                                    class="absolute left-0 z-50 mt-1 w-full max-h-60 overflow-y-auto rounded-lg border border-border bg-white shadow-lg"
                                    style="display: none;">

                                    @foreach ($employees as $employee)

                                        @php
                                            $fullName = $employee->last_name . ', ' .
                                                $employee->first_name . ' ' .
                                                $employee->middle_name;
                                        @endphp

                                        <div x-show="'{{ strtolower($fullName) }}'.includes(search.toLowerCase())" @click="
                                                                selected = '{{ $employee->id }}';
                                                                search = '{{ $fullName }}';
                                                                open = false;
                                                            " class="cursor-pointer px-4 py-3 hover:bg-gray-100">
                                            {{ $fullName }}
                                        </div>

                                    @endforeach

                                    <!-- No result -->
                                    <div x-show="search !== '' && !Array.from($el.parentElement.children).some(el => el !== $el && el.style.display !== 'none')"
                                        class="px-4 py-3 text-gray-500">
                                        No employee found.
                                    </div>

                                </div>

                                <!-- Selected Employee ID -->
                                <input type="hidden" name="accountable_person_id" x-model="selected">
                            </div>


                            <!-- Document Date -->

                            <div class="">
                                <label class="font-semibold text-text"> Document Date </label>
                                <input type="date" name="document_date"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                                @error('document_date')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                            <!-- Received From Person -->
                            <div x-data="{ open: false, search: '', selected: '' }" class="relative">

                                <label class="font-semibold text-text">
                                    Received From Person
                                </label>

                                <!-- Search Input -->
                                <input type="text" x-model="search" @click="open = true"
                                    placeholder="Search for an employee" autocomplete="off"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">

                                <!-- Dropdown -->
                                <div x-show="open" @click.away="open = false"
                                    class="absolute left-0 z-50 mt-1 w-full max-h-60 overflow-y-auto rounded-lg border border-border bg-white shadow-lg"
                                    style="display: none;">

                                    @foreach ($employees as $employee)

                                        @php
                                            $fullName = $employee->last_name . ', ' .
                                                $employee->first_name . ' ' .
                                                $employee->middle_name;
                                        @endphp

                                        <div x-show="'{{ strtolower($fullName) }}'.includes(search.toLowerCase())" @click="
                                                                selected = '{{ $employee->id }}';
                                                                search = '{{ $fullName }}';
                                                                open = false;
                                                            " class="cursor-pointer px-4 py-3 hover:bg-gray-100">
                                            {{ $fullName }}
                                        </div>

                                    @endforeach

                                    <!-- No result -->
                                    <div x-show="search !== '' && !Array.from($el.parentElement.children).some(el => el !== $el && el.style.display !== 'none')"
                                        class="px-4 py-3 text-gray-500">
                                        No employee found.
                                    </div>

                                </div>

                                <!-- Selected Employee ID -->
                                <input type="hidden" name="received_from_id" x-model="selected">
                            </div>



                            <!-- Received By Person -->
                            <div x-data="{ open: false, search: '', selected: '' }" class="relative">

                                <label class="font-semibold text-text">
                                    Received By Person
                                </label>

                                <!-- Search Input -->
                                <input type="text" x-model="search" @click="open = true"
                                    placeholder="Search for an employee" autocomplete="off"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">

                                <!-- Dropdown -->
                                <div x-show="open" @click.away="open = false"
                                    class="absolute left-0 z-50 mt-1 w-full max-h-60 overflow-y-auto rounded-lg border border-border bg-white shadow-lg"
                                    style="display: none;">

                                    @foreach ($employees as $employee)

                                        @php
                                            $fullName = $employee->last_name . ', ' .
                                                $employee->first_name . ' ' .
                                                $employee->middle_name;
                                        @endphp

                                        <div x-show="'{{ strtolower($fullName) }}'.includes(search.toLowerCase())" @click="
                                                                selected = '{{ $employee->id }}';
                                                                search = '{{ $fullName }}';
                                                                open = false;
                                                            " class="cursor-pointer px-4 py-3 hover:bg-gray-100">
                                            {{ $fullName }}
                                        </div>

                                    @endforeach

                                    <!-- No result -->
                                    <div x-show="search !== '' && !Array.from($el.parentElement.children).some(el => el !== $el && el.style.display !== 'none')"
                                        class="px-4 py-3 text-gray-500">
                                        No employee found.
                                    </div>

                                </div>

                                <!-- Selected Employee ID -->
                                <input type="hidden" name="received_by_id" x-model="selected">
                            </div>
                        </div>


                        <!-- Remarks -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div class="md:col-span-2 ">
                                <label class="font-semibold text-text"> Remarks </label>
                                <textarea name="remarks" rows="3"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3"></textarea>
                                @error('remarks')
                                    <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>


                        <!-- Buttons -->
                        <div class="flex justify-end gap-3 mt-8"> <a href="{{ route('inventory-documents.index') }}"
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