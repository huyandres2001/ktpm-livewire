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
                                <label class="form-control-label">{{ __('Search name') }}</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label class="form-control-label">{{ __('Search assignee name') }}</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label class="form-control-label">{{ __('Schedule date start') }}</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label class="form-control-label">{{ __('Schedule date end') }}</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label class="form-control-label">{{ __('Created date start') }}</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            @can('jobs.create')
                                @include('livewire.jobs.create-job-modal')
                                <button class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal"
                                    data-bs-target="#createJobModal">+&nbsp; New Job
                                </button>
                            @endcan
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" id="searchName"
                                    wire:model.debounce="searchName">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" wire:model.debounce="searchAssignee">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" wire:model.debounce="scheduleStartDate">
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" wire:model.debounce="scheduleEndDate">
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" wire:model.debounce="createdStartDate">

                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" wire:model.debounce="createdEndDate">
                        </div>
                        @can('jobs.update')
                            @include('livewire.jobs.edit-job-modal')
                        @endcan
                        @can('jobs.read')
                            @include('livewire.jobs.show-modal')
                        @endcan
                        @can('jobs.evaluate')
                            @include('livewire.jobs.evaluate-job-modal')
                        @endcan
                        @can('jobs.assign')
                            @include('livewire.jobs.assign-job-modal')
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
                                        Schedule
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Description
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created at
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobsList as $job)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $job->id }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0">{{ $job->name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $job->schedule }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ Str::limit($job->description, 20, '...') }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $job->created_at->format('Y-m-d') }}</p>
                                        </td>

                                        <td class="text-center">
                                            @can('jobs.read')
                                                <button href="#" class="mx-1" id="jobDetails"
                                                    wire:click="show({{ $job->id }})"
                                                    style="border: none;padding: 0;background: none;" data-bs-toggle="modal"
                                                    data-bs-target="#showJobModal" data-bs-original-title="Job details">
                                                    <i class="fas fa-eye text-secondary"></i>
                                                </button>
                                            @endcan
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ $jobsList->links() }}
</div>
