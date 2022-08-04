<div class="col-md-6">
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" wire:ignore.self id="evaluateJobModal" tabindex="-1" role="dialog"
        aria-labelledby="evaluateJobModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job evaluation for "{{ $jobToBeEvaluated->name }}"
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="job_evaluations.progress"
                                        class="form-control-label">{{ __('Progress') }}</label>
                                    <div
                                        class="@error('job_evaluations.progress') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="job_evaluations.progress" class="form-control"
                                            placeholder="progress" type="text" id="job_evaluations.progress">
                                    </div>
                                </div>
                                @error('job_evaluations.progress')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="job_evaluations.status"
                                        class="form-control-label">{{ __('Status') }}</label>
                                    <div
                                        class="@error('job_evaluations.status') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="job_evaluations.status" class="form-control"
                                            placeholder="status" type="text" id="job_evaluations.status">
                                    </div>
                                </div>
                                @error('job_evaluations.status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="job_evaluations.kpi"
                                        class="form-control-label">{{ __('KPI') }}</label>
                                    <div class="@error('job_evaluations.kpi') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="job_evaluations.kpi" class="form-control"
                                            placeholder="kpi" type="text" id="job_evaluations.kpi">
                                    </div>
                                </div>
                                @error('job_evaluations.kpi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-gradient-primary" id="assignButton"
                        wire:click.prevent="addJobEvaluation">Add
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
