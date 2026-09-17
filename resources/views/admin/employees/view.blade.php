<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Employee') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg min-h-screen p-6">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-primary">
                            Employee Details
                        </h1>
                        <p class="text-muted mt-1">
                            View complete employee information.
                        </p>
                    </div>
                    <div class="flex gap-3 mt-4 sm:mt-0">
                        <a href="{{ route('employees.index') }}"
                            class="px-5 py-2.5 rounded-lg border border-border hover:bg-gray-100 transition">
                            Back
                        </a>
                        <a href="{{ route('employees.edit', $employee->id) }}"
                            class="px-5 py-2.5 rounded-lg bg-secondary hover:bg-secondary-hover text-white transition">
                            Edit
                        </a>
                    </div>
                </div>
                <!-- Profile Card -->
                <div class="bg-surface border border-border rounded-xl shadow p-6 mb-6">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <!-- Image -->
                        <img src="{{ asset('storage/' . $employee->employee_image) }}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-secondary-light">
                        <div>
                            <h2 class="text-2xl font-bold text-primary">
                                {{ $employee->first_name }}
                                {{ $employee->middle_name }}
                                {{ $employee->last_name }}
                            </h2>

                            <p class="text-secondary font-semibold mt-2">
                                Employee No:
                                {{ $employee->employee_number }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Employment Information -->
                <div class="bg-surface border border-border rounded-xl shadow p-6 mb-6">
                    <h2 class="text-xl font-bold text-primary mb-5">
                        Employment Information
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <p class="text-muted text-sm">
                                Department
                            </p>
                            <p class="font-semibold text-text">
                                {{ $employee->department->department_name ?? 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-muted text-sm">
                                Position
                            </p>
                            <p class="font-semibold">
                                {{ $employee->position }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 gap-6">
                    <!-- Personal Information -->
                    <div class="bg-white rounded-xl shadow border border-border p-6">
                        <h2 class="text-xl font-bold text-primary mb-5">
                            Personal Information
                        </h2>
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-muted">First Name</span>
                                <span class="font-semibold">{{ $employee->first_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-muted">Middle Name</span>
                                <span class="font-semibold">{{ $employee->middle_name ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-muted">Last Name</span>
                                <span class="font-semibold">{{ $employee->last_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-muted">Birth Date</span>
                                <span class="font-semibold">
                                    {{ \Carbon\Carbon::parse($employee->birth_date)->format('F d, Y') }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-muted">Contact</span>
                                <span class="font-semibold">{{ $employee->contact_number }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Emergency Contact -->
                    <div class="bg-white rounded-xl shadow border border-border p-6">
                        <h2 class="text-xl font-bold text-primary mb-5">
                            Emergency Contact
                        </h2>
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-muted">Name</span>
                                <span class="font-semibold">
                                    {{ $employee->contact_person_name }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-muted">Contact Number</span>
                                <span class="font-semibold">
                                    {{ $employee->contact_person_number }}
                                </span>
                            </div>
                            <div>
                                <span class="text-muted block mb-2">
                                    Address
                                </span>
                                <p class="font-semibold">
                                    {{ $employee->contact_person_address }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-5 flex align-items-center justify-center">
                    <h1 class=" text-2xl text-primary font-bold">Issued Items</h1>
                </div>
                <div class="bg-surface border border-border rounded-xl shadow overflow-hidden mt-5">
                    <div class="flex justify-end p-5">
                        <a href="{{ route('inventory.create', $employee->id) }}"
                            class="mt-4  sm:mt-0 bg-secondary hover:bg-secondary-hover text-white px-5 py-2.5 rounded-lg shadow transition">
                            + Add Item
                        </a>
                    </div>
                    <table class="w-full text-sm text-left text-text">
                        <!-- Header -->
                        <thead class=" text-sm text-white bg-primary uppercase ">
                            <tr>
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
                                @if ($inv->employee_id == $employee->id)
                                    <tr class=" bg-white border-b border-border hover:bg-green-50 transition ">


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
                                @endif

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>