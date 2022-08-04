<div class="modal fade" wire:ignore.self id="assignJobModal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Job assignment</h6>
            </div>

            {{-- search assignee zone --}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" wire:model.debounce="searchAssigneeName"
                                placeholder="Name...">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" wire:model.debounce="searchAssigneeEmail"
                                placeholder="Email...">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" wire:model.debounce="searchAssigneePhone"
                                placeholder="Phone...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <select wire:model.debounce="filterAssigneeDepartment" wire:ignore class="form-control"
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
                    <div class="col-md-3">
                        <div class="input-group">
                            <select wire:model.debounce="filterAssigneeStatus" wire:ignore class="form-control"
                                id="user-department">
                                <option value="-1">
                                    Select status
                                </option>
                                <option value="1">
                                    Assigned
                                </option>
                                <option value="0">
                                    Unassigned
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>

                @foreach ($employees as $assignee)
                    {{-- filter status
                        if condition not match, jump to next loop
                        Ex: if filter status is Assigned (1), then if an assignee has unassigned status, ignore this assignee with @continue --}}
                    @switch($filterAssigneeStatus)
                        @case(1)
                            @php
                                if (checkIfAssigneeIsAssigned($assignee->id, $assignJob->id) === false) {
                                    continue 2;
                                }
                            @endphp
                        @break

                        @case(0)
                            @php
                                if (checkIfAssigneeIsAssigned($assignee->id, $assignJob->id) !== false) {
                                    continue 2;
                                }
                            @endphp
                        @break

                        @default
                        @break
                    @endswitch
                    <div class="row">
                        {{-- is assigned --}}
                        @if (checkIfAssigneeIsAssigned($assignee->id, $assignJob->id) !== false)
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Name:</h5>
                                    <p>{{ $assignee->name }}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>Email:</h5>
                                    <p>{{ $assignee->email }}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>Phone:</h5>
                                    <p>{{ $assignee->phone }}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>Department:</h5>
                                    <p>{{ $assignee->department->name }}</p>
                                </div>
                            </div>
                            @php
                                $jobAssignment = DB::table('employee_job')
                                    ->where('employee_id', $assignee->id)
                                    ->where('job_id', $assignJob->id)
                                    ->first();
                            @endphp
                            <div class="col-md-3">
                                <h5>Assigned Day:</h5>
                                <p>{{ $jobAssignment->assigned_day }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5>Deadline:</h5>
                                <p>{{ $jobAssignment->deadline }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5>Requirements:</h5>
                                <p>{{ $jobAssignment->requirements }}</p>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <h5>Status:</h5>
                                    {{-- <label for="assignedButton" class="form-control-label" >{{__('Status')}}</label> --}}
                                    <button type="button" class="btn btn-success" id="assignedButton"
                                        onclick="confirm('Are you sure you want to unassign this job?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="unassignJob({{ $assignee->id }}, {{ $assignJob->id }})">Assigned</button>
                                </div>
                            </div>
                        @else
                            {{-- is not assigned --}}
                            <div class="col-md-2">
                                <h5>Name:</h5>
                                <p>{{ $assignee->name }}</p>
                            </div>
                            <div class="col-md-2">
                                <h5>Email:</h5>
                                <p>{{ $assignee->email }}</p>
                            </div>
                            <div class="col-md-2">
                                <h5>Phone:</h5>
                                <p>{{ $assignee->phone }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5>Department:</h5>
                                <p>{{ $assignee->department->name }}</p>
                            </div>
                            <div class="col-md-3">
                                <h5>Status:</h5>
                                <button type="button" class="btn btn-success" style="background-color: red;"
                                    data-bs-toggle="modal"
                                    wire:click.prevent="toggleAssignmentForm({{ $assignee->id }}, {{ $assignJob->id }})">Unassigned</button>
                            </div>
                        @endif
                        {{-- job assignment form --}}
                        @if ($toggleAssignmentForm && $assigneeToAssign->id == $assignee->id)
                            <div class="row">
                                <h5>Assign job: {{ $jobToAssign->name }} to {{ $assigneeToAssign->name }}</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="deadline" class="form-control-label">{{ __('Deadline') }}</label>
                                        <div
                                            class="@error('employee_job.deadline') border border-danger rounded-3 @enderror">
                                            <input wire:model.debounce="employee_job.deadline" class="form-control"
                                                type="date" id="deadline">
                                        </div>
                                    </div>
                                    @error('employee_job.deadline')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="requirements"
                                            class="form-control-label">{{ __('Requirements') }}</label>
                                        <div
                                            class="@error('employee_job.requirements') border border-danger rounded-3 @enderror">
                                            <input wire:model.debounce="employee_job.requirements" class="form-control"
                                                type="text" id="requirements">
                                        </div>
                                    </div>
                                    @error('employee_job.requirements')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="assignButton"
                                            class="form-control-label">{{ __('Action') }}</label>
                                        <button type="button" class="btn btn-success" id="assignButton"
                                            style="background-color: blue"
                                            wire:click.prevent="assignJob({{ $assignee->id }}, {{$assignJob->id}})">Assign</button>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <hr>
                @endforeach
                <div class="modal-footer">
                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
