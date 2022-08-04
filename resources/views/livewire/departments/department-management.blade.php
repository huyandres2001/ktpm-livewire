<div class="main-content">
    <div class="row">
        <div class="col">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <label class="form-control-label">{{ __('Search name') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <label class="form-control-label">{{ __('Search address') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <label class="form-control-label">{{ __('Search phone') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <label class="form-control-label">{{ __('Search manager') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" id="searchName" placeholder="Name..."
                                            wire:model.debounce="searchName">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" id="searchAddress"
                                            placeholder="Address..." wire:model.debounce="searchAddress">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" id="searchPhone"
                                            placeholder="Phone..." wire:model.debounce="searchPhone">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" id="searchManager"
                                            placeholder="Manager's name..." wire:model.debounce="searchManager">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            @can('department.create')
                                @include('livewire.departments.create-department-modal')
                                <button class="btn bg-gradient-primary btn-sm mb-0" type="button" style="float: right;"
                                    wire:click.prevent="create" data-bs-toggle="modal"
                                    data-bs-target="#createDepartmentModal">+&nbsp; New Department
                                </button>
                            @endcan
                        </div>
                        @can('departments.read')
                            @include('livewire.departments.show-department-modal')
                        @endcan
                        @can('departments.update')
                            @include('livewire.departments.edit-department-modal')
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
                                        Address
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Phone
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Manager
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departmentList as $department)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $department->id }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">{{ $department->name }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ Str::limit($department->address, 50, '...') }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $department->phone }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $department->manager->name }}
                                            </p>
                                        </td>
                                        {{-- <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ Str::limit($job->description, 20, '...') }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $job->created_at->format('Y-m-d') }}</p>
                                        </td> --}}
                                        <td class="text-center">
                                            @can('departments.read')
                                                <button href="#" class="mx-1" id="departmentDetails"
                                                    style="border: none;padding: 0;background: none;" data-bs-toggle="modal"
                                                    wire:click='show({{ $department->id }})'
                                                    data-bs-target="#showDepartmentModal"
                                                    data-bs-original-title="Department details">
                                                    <i class="fas fa-eye text-secondary"></i>
                                                </button>
                                            @endcan
                                            @can('departments.update')
                                                <button href="#" class="mx-1" id="editDepartment"
                                                    style="border: none;padding: 0;background: none;"
                                                    data-bs-toggle="modal" wire:click='edit({{ $department->id }})'
                                                    data-bs-target="#editDepartmentModal"
                                                    data-bs-original-title="Edit department">
                                                    <i class="fas fa-edit text-secondary"></i>
                                                </button>
                                            @endcan
                                            @can('departments.delete')
                                                <button href="#"
                                                    onclick="confirm('Are you sure you want to remove this department?') || event.stopImmediatePropagation()"
                                                    wire:click.prevent="delete({{ $department->id }})" class="mx-1"
                                                    id="deleteDepartment" style="border: none;padding: 0;background: none;"
                                                    data-bs-original-title="Delete department">
                                                    <i class="fas fa-trash text-secondary"></i>
                                                </button>
                                            @endcan
                                        </td>
                                        {{-- <td class="text-center">

                                            @can('jobs.update')
                                                <button href="#" class="mx-1" id="editjob"
                                                    wire:click="edit({{ $job->id }})"
                                                    style="border: none;padding: 0;background: none;" data-bs-toggle="modal"
                                                    data-bs-target="#editJobModal" data-bs-original-title="Edit job">
                                                    <i class="fas fa-edit text-secondary"></i>
                                                </button>
                                            @endcan
                                            @can('jobs.assign')
                                                <button href="#" class="mx-1" id="editEmployee"
                                                    wire:click="assignJobModal({{ $job->id }})"
                                                    style="border: none;padding: 0;background: none;"
                                                    data-bs-toggle="modal" data-bs-target="#assignJobModal"
                                                    data-bs-original-title="Assign job">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </button>
                                            @endcan
                                            @can('jobs.evaluate')
                                                <button class="mx-1" id="evaluatejob"
                                                    style="border: none;padding: 0;background: none;"
                                                    data-bs-toggle="modal" data-bs-target="#evaluateJobModal"
                                                    wire:click.prevent="showJobEvaluateModal({{ $job->id }})"
                                                    data-bs-original-title="Evaluate job">
                                                    <i class="fa fa-calendar-check-o text-secondary"></i>
                                                </button>
                                            @endcan
                                            @can('jobs.delete')
                                                <button href="#"
                                                    onclick="confirm('Are you sure you want to remove the user from this group?') || event.stopImmediatePropagation()"
                                                    wire:click.prevent="delete({{ $job->id }})" class="mx-1"
                                                    id="deleteJob" style="border: none;padding: 0;background: none;"
                                                    data-bs-original-title="Delete job">
                                                    <i class="fas fa-trash text-secondary"></i>
                                                </button>
                                            @endcan
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $departmentList->links() }}
</div>
