<div class="col-md-6">
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" wire:ignore.self id="editJobModal" tabindex="-1" role="dialog"
        aria-labelledby="createJobModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="jobs-name" class="form-control-label">{{ __('Jobs name') }}</label>
                                    <div class="@error('jobs.name') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="jobs.name" class="form-control"
                                            placeholder="Jobs's name..." type="text" id="jobs-name">
                                    </div>
                                </div>
                                @error('jobs.name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="jobs-schedule"
                                        class="form-control-label">{{ __('Schedule') }}</label>
                                    <div class="@error('jobs.schedule') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="jobs.schedule" class="form-control" placeholder="Jobs's schedule..."
                                            type="date" id="jobs-schedule">
                                    </div>
                                </div>
                                @error('jobs.schedule')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="jobs-description"
                                        class="form-control-label">{{ __('Description') }}</label>
                                    <div class="@error('jobs.description') border border-danger rounded-3 @enderror">
                                        <textarea wire:model.debounce="jobs.description" class="form-control" placeholder="Jobs's description..."
                                            type="text-area" id="jobs-description"></textarea>
                                    </div>
                                </div>
                                @error('jobs.description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="jobs-note"
                                        class="form-control-label">{{ __('Note') }}</label>
                                    <div class="@error('jobs.note') border border-danger rounded-3 @enderror">
                                        <textarea wire:model.debounce="jobs.note" class="form-control" placeholder="Jobs's note..."
                                            type="text-area" id="jobs-note"></textarea>
                                    </div>
                                </div>
                                @error('jobs.note')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="addjobsButton" class="btn bg-gradient-primary"  wire:click="update">Edit
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
