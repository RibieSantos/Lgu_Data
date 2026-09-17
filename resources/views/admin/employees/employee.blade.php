<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
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
                                Employee Management
                            </h1>

                            <p class="text-muted mt-1">
                                Manage LGU employees and information.
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
                                    <form action="{{ route('employees.index') }}" method="GET">
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
                                            <!-- Department Filter -->
                                            <select 
                                                name="department_id"
                                                class="bg-secondary text-white px-4 py-2.5 rounded-lg shadow"
                                                onchange="this.form.submit()">
                                                <option value="">
                                                    All Departments
                                                </option>
                                                @foreach($departments as $department)
                                                    <option 
                                                        value="{{ $department->id }}"
                                                        {{ request('department_id') == $department->id ? 'selected' : '' }}>
                                                        {{ $department->department_code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                    
                                </div>
                                <!-- Table -->
                                <table class="w-full text-sm text-left text-text">
                                    <!-- Header -->
                                    <thead class=" text-sm text-white bg-primary uppercase ">
                                        <tr>
                                            <th class="px-6 py-4">
                                                Employee
                                            </th>
                                            <th class="px-6 py-4">
                                                Department
                                            </th>
                                            <th class="px-6 py-4">
                                                Position
                                            </th>
                                            <th class="px-6 py-4">
                                                Contact
                                            </th>
                                            <th class="px-6 py-4 text-center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employees as $employee)
                                            <tr class=" bg-white border-b border-border hover:bg-green-50 transition ">
                                                <!-- Employee Image -->
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center gap-4">
                                                        @if($employee->employee_image)
                                                            <img src="{{ asset('storage/' . $employee->employee_image) }}"
                                                                class="
                                                                                                    w-12
                                                                                                    h-12
                                                                                                    rounded-full
                                                                                                    object-cover
                                                                                                    border-2
                                                                                                    border-secondary-light
                                                                                                    ">
                                                        @else
                                                            <div class="
                                                                                                    w-12
                                                                                                    h-12
                                                                                                    rounded-full
                                                                                                    bg-gray-200
                                                                                                    flex
                                                                                                    items-center
                                                                                                    justify-center">
                                                                <span class="text-gray-500">
                                                                    ?
                                                                </span>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            <p class="font-semibold text-primary">
                                                                {{ $employee->first_name }}
                                                                {{ $employee->last_name }}
                                                            </p>
                                                            <p class="text-sm text-muted">
                                                                {{ $employee->employee_number }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!-- Department -->
                                                <td class="px-6 py-4 font-medium">
                                                    {{ $employee->department->department_name ?? 'N/A' }}
                                                </td>
                                                <!-- Position -->
                                                <td class="px-6 py-4">
                                                    {{ $employee->position }}
                                                </td>
                                                <!-- Contact -->
                                                <td class="px-6 py-4">
                                                    {{ $employee->contact_number }}
                                                </td>
                                                <!-- Actions -->
                                                <td class="px-6 py-4">
                                                    <div class="flex justify-center gap-2">
                                                        <!-- View -->
                                                        <a href="{{ route('employees.view', $employee->id) }}" class="
                                                                    px-3
                                                                    py-1.5
                                                                    text-xs
                                                                    rounded-lg
                                                                    bg-primary
                                                                    text-white
                                                                    hover:bg-primary-hover
                                                                    ">
                                                            View
                                                        </a>
                                                        <!-- Edit -->
                                                        <a href="{{ route('employees.edit', $employee->id) }}" class="
                                                                    px-3
                                                                    py-1.5
                                                                    text-xs
                                                                    rounded-lg
                                                                    bg-secondary
                                                                    text-white
                                                                    hover:bg-secondary-hover
                                                                    ">
                                                            Edit
                                                        </a>
                                                        <!-- Delete -->
                                                        <form action="{{ route('employees.destroy', $employee->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Delete this employee?')" class="
                                                                    px-3
                                                                    py-1.5
                                                                    text-xs
                                                                    rounded-lg
                                                                    bg-error
                                                                    text-white
                                                                    hover:bg-red-700
                                                                    ">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                                <div class="m-4">
    {{ $employees->links() }}
</div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>