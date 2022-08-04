<div class="modal fade" wire:ignore.self id="createDepartmentModal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Department details</h6>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="departments.name"
                                    class="form-control-label">{{ __('Department name') }}</label>
                                <div class="@error('departments.name') border border-danger rounded-3 @enderror">
                                    <input wire:model.debounce="departments.name" class="form-control"
                                        placeholder="Department's name..." type="text" id="departments.name">
                                </div>
                            </div>
                            @error('departments.name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="departments.address"
                                    class="form-control-label">{{ __('Department address') }}</label>
                                <div class="@error('departments.address') border border-danger rounded-3 @enderror">
                                    <input wire:model.debounce="departments.address" class="form-control"
                                        placeholder="Department's address..." type="text" id="departments.address">
                                </div>
                            </div>
                            @error('departments.address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="departments.phone"
                                    class="form-control-label">{{ __('Department phone') }}</label>
                                <div class="@error('departments.phone') border border-danger rounded-3 @enderror">
                                    <input wire:model.debounce="departments.phone" class="form-control"
                                        placeholder="Department's phone..." type="text" id="departments.phone">
                                </div>
                            </div>
                            @error('departments.phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="manager"
                                    class="form-control-label">{{ __('Department\'s manager') }}</label>
                                <div class="@error('manager') border border-danger rounded-3 @enderror">
                                    <select wire:model.debounce="manager" wire:ignore class="form-control"
                                        id="user-department">
                                        <option value="">
                                            Select manager
                                        </option>
                                        @foreach ($employeeList as $employee)
                                            <option value="{{ $employee->id }}">
                                                {{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('manager')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" id="addDepartmentButton" class="btn bg-gradient-primary"  wire:click="store">Create
                </button>
            </div>
        </div>
    </div>
</div>
