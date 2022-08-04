@can('users.read')
    @include('livewire.users.show-modal')
@endcan
<div class="modal fade" wire:ignore.self id="showJobModal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Job details</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Name: <p> {{ $showJob->name }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Schedule: <p> {{ $showJob->schedule }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Created at: <p> {{ $showJob->created_at }}</p>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <h5>Description:</h5>
                        <p>{{ $showJob->description }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <h5>Note:</h5>
                        <p>{{ $showJob->note }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h5>Assignee:</h5>
                    @foreach ($showJob->employees as $assignee)
                        <div class="col-md-3">
                            <a href="{{ route('employee-management', ['id' => $assignee->id]) }}" target="_blank"
                                {{-- wire:click="assigneeProfile({{ $assignee->id }})" --}}>{{ $assignee->name }}</a>
                        </div>
                    @endforeach
                </div>
                <hr>
                <div class="row">
                    <h5>Evaluations:</h5>
                    @foreach ($showJob->job_evaluations as $evaluation)
                        <div class="row">
                            <div class="col-md-3">
                                <h6>Progress:</h6>
                                <p>{{ $evaluation->progress }}</p>
                            </div>
                            <div class="col-md-3">
                                <h6>Status:</h6>
                                <p>{{ $evaluation->status }}</p>
                            </div>
                            <div class="col-md-3">
                                <h6>KPI:</h6>
                                <p>{{ $evaluation->kpi }}</p>
                            </div>
                            <div class="col-md-3">
                                <h6>Created at:</h6>
                                <p>{{ $evaluation->created_at }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
