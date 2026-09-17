<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg min-h-screen p-6">

                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-primary"> Edit Employee </h1>
                        <p class="text-muted mt-1"> Update employee information. </p>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-surface border border-border rounded-xl shadow">

                    <form action="{{ route('employees.update', $employee->id) }}" method="POST"
                        enctype="multipart/form-data" class="p-8">
                        @csrf
                        @method('PUT')

                        <!-- Employee Information -->
                        <h2 class="text-xl font-bold text-primary mb-5"> Employee Information </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Employee Number -->
                            <div>
                                <label class="font-semibold text-text"> Employee Number </label>
                                <input type="text" name="employee_number" placeholder="EMP-0001"
                                    value="{{ old('employee_number', $employee->employee_number) }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3 focus:ring-primary focus:border-primary">
                                @error('employee_number') <p class="text-error text-sm mt-1"> {{ $message }} </p>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div>
                                <label class="font-semibold text-text">
                                    Employee Photo
                                </label>
                                <input type="file" name="employee_image"
                                    class="mt-2 w-full border border-border rounded-lg p-3">
                            </div>

                            <!-- Department -->
                            <div>
                                <label class="font-semibold text-text">
                                    Department
                                </label>
                                <select name="department_id"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                                    <option value=""> Select Department </option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Position -->
                            <div>
                                <label class="font-semibold text-text">
                                    Position
                                </label>
                                <input type="text" name="position" placeholder="Administrative Officer"
                                    value="{{ old('position', $employee->position) }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <h2 class="text-xl font-bold text-primary mt-8 mb-5"> Personal Information </h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label>
                                    First Name
                                </label>
                                <input type="text" name="first_name"
                                    value="{{ old('first_name', $employee->first_name) }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                            </div>
                            <div>
                                <label> Middle Name </label>
                                <input type="text" name="middle_name"
                                    value="{{ old('middle_name', $employee->middle_name) }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                            </div>
                            <div>
                                <label> Last Name </label> <input type="text" name="last_name"
                                    value="{{ old('last_name', $employee->last_name) }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                            <!-- Birth Date -->
                            <div>
                                <label> Birth Date </label>
                                <input type="date" name="birth_date"
                                    value="{{ old('birth_date', $employee->birth_date) }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                            </div> <!-- Contact -->
                            <div>
                                <label> Contact Number </label>
                                <input type="text" name="contact_number" placeholder="09xxxxxxxxx"
                                    value="{{ old('contact_number', $employee->contact_number) }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                            </div>
                        </div>

                        <!-- Emergency Contact -->
                        <h2 class="text-xl font-bold text-primary mt-8 mb-5"> Emergency Contact </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label> Contact Person Name </label>
                                <input type="text" name="contact_person_name"
                                    value="{{ old('contact_person_name', $employee->contact_person_name) }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                            </div>
                            <div>
                                <label> Contact Person Number </label>
                                <input type="text" name="contact_person_number"
                                    value="{{ old('contact_person_number', $employee->contact_person_number) }}"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">
                            </div>
                            <div class="md:col-span-2">
                                <label> Contact Person Address </label>
                                <textarea name="contact_person_address" rows="3"
                                    class="mt-2 w-full rounded-lg border border-border px-4 py-3">{{ old('contact_person_address', $employee->contact_person_address) }}</textarea>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end gap-3 mt-8"> <a href="{{ route('employees.index') }}"
                                class="px-6 py-3 rounded-lg border border-border hover:bg-gray-100"> Cancel </a> <button
                                type="submit"
                                class="px-6 py-3 rounded-lg bg-secondary hover:bg-secondary-hover text-white shadow">
                                Save Employee </button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>