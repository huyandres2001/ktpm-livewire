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
                    <h5>Assignee:</h5>
                    @foreach ($showJob->employees as $assignee)
                        <div class="col-md-3">
                            <a href="{{ route('employee-management', ['id' => $assignee->id]) }}"
                                target="_blank" {{-- wire:click="assigneeProfile({{ $assignee->id }})" --}}>{{ $assignee->name }}</a>
                        </div>
                        {{-- <button href="#" class="mx-1" id="jobDetails" wire:click="assigneeProfile({{ $assignee->id }})"
                            style="border: none;padding: 0;background: none;" data-bs-toggle="modal"
                            data-bs-target="#showUserModal" data-bs-original-title="{{ $assignee->name }}">

                        </button> --}}
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
