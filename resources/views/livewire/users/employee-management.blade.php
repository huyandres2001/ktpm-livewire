@php
$departments = getAllDepartments();
@endphp
<div class="main-content">
    <div class="row">
        <div class="col">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" wire:model.debounce="searchName"
                                    placeholder="Name...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" wire:model.debounce="searchEmail"
                                    placeholder="Email...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" wire:model.debounce="searchPhone"
                                    placeholder="Phone...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" wire:model.debounce="searchLocation"
                                    placeholder="Address...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <select wire:model.debounce="filterDepartment" wire:ignore class="form-control"
                                    id="user-department" placeholder="Department...">
                                    <option value="">
                                        Select department
                                    </option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">
                                            {{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            @can('users.create')
                                @include('livewire.users.create-employee-modal')
                                <button class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal"
                                    data-bs-target="#createEmployeeModal">+&nbsp; New Employee
                                </button>
                            @endcan
                        </div>
                        @can('users.update')
                            @include('livewire.users.edit-employee-modal')
                        @endcan
                        @can('users.read')
                            @include('livewire.users.show-modal')
                        @endcan
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Gender
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Birthday
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Phone
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Address
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        department
                                    </th>
                                    @hasrole('admin')
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID card
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Major
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            certificate
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            salary
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    @endhasrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $employee->id }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">{{ $employee->name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <i
                                                class="{{ $employee->gender == 'male' ? 'fa fa-mars' : 'fa fa-venus' }}"></i>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">{{ $employee->birthday }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">{{ $employee->phone }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">{{ $employee->email }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ Str::limit($employee->location, 10, $end = '...') }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ Str::limit($employee->department->name, 20, $end = '...') }}</p>
                                        </td>
                                        @role('admin')
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ Str::limit($employee->identity_card, 3, $end = '...') }}</p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ Str::limit($employee->eduLevel->major, 20, $end = '...') }}</p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ Str::limit($employee->eduLevel->certificate, 20, $end = '...') }}
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ currencyForm(final_salary($employee)) }} USD
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                @can('users.read')
                                                    <button href="#" class="mx-1" id="showEmployee"
                                                        wire:click="show({{ $employee->id }})"
                                                        style="border: none;padding: 0;background: none;"
                                                        data-bs-toggle="modal" data-bs-target="#showEmployeeModal"
                                                        data-bs-original-title="Show Employee">
                                                        <i class="fas fa-eye text-secondary"></i>
                                                    </button>
                                                @endcan
                                                @can('users.update')
                                                    <button href="#" class="mx-1" id="editEmployee"
                                                        wire:click="edit({{ $employee->id }})"
                                                        style="border: none;padding: 0;background: none;"
                                                        data-bs-toggle="modal" data-bs-target="#editEmployeeModal"
                                                        data-bs-original-title="Edit Employee">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </button>
                                                @endcan
                                                @can('users.delete')
                                                    <button href="#"
                                                        onclick="confirm('Are you sure you want to remove the user from this group?') || event.stopImmediatePropagation()"
                                                        wire:click.prevent="delete({{ $employee->id }})" class="mx-1"
                                                        id="deleteEmployee" style="border: none;padding: 0;background: none;"
                                                        data-bs-original-title="Delete Employee">
                                                        <i class="fas fa-trash text-secondary"></i>
                                                    </button>
                                                @endcan

                                            </td>
                                        @endrole
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ $employees->links() }}
</div>
