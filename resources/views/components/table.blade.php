<div class="relative overflow-x-auto bg-white shadow-lg rounded-xl border border-border">
        <!-- Top Toolbar -->
        <div class="p-5 flex flex-col md:flex-row items-center justify-between gap-4">
            <!-- Search -->
            <div class="relative w-full md:w-96">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-muted" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 6 6a7.5 7.5 0 0 0 10.65 10.65Z" />
                </svg>
            </div>
            <input type="text" placeholder="Search employee..." class="
                w-full
                pl-10
                pr-4
                py-2.5
                bg-gray-50
                border
                border-border
                rounded-lg
                text-text
                focus:ring-2
                focus:ring-secondary
                focus:border-secondary
                ">
        </div>
        <!-- Add Button -->
        <a href="{{ route('employees.create') }}" class="
            inline-flex
            items-center
            gap-2
            px-5
            py-2.5
            rounded-lg
            bg-secondary
            hover:bg-secondary-hover
            text-white
            font-medium
            shadow
            transition
            ">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
                Add Employee
        </a>
    </div>
    <!-- Table -->
    <table class="w-full text-sm text-left text-text">
            <!-- Header -->
            <thead class="
                text-sm
                text-white
                bg-primary
                uppercase
                ">
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
                    <tr class="
                        bg-white
                        border-b
                        border-border
                        hover:bg-green-50
                        transition
                        ">
                        <!-- Employee -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                @if($employee->employee_image)
                                    <img src="{{ asset('storage/' . $employee->employee_image) }}" class="
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
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
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
</div>  