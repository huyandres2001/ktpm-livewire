<div class="col-md-6">
    <!-- Button trigger modal -->
    @php
        $departments = getAllDepartments();
    @endphp
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg"  wire:ignore.self id="createEmployeeModal" tabindex="-1" role="dialog"
        aria-labelledby="createEmployeeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">{{ __('Name') }}</label>
                                    <div class="@error('users.name') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="users.name" class="form-control"
                                            placeholder="Tom..." type="text" id="user-name">
                                    </div>
                                </div>
                                @error('users.name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="user-gender">{{ __('Gender') }}</label>
                                    <div class="@error('users.gender') border border-danger rounded-3 @enderror">
                                        <select wire:model="users.gender" class="form-control" id="user-gender">
                                            <option selected>Select gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    @error('users.gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="user-birthday" class="form-control-label">{{ __('Birthday') }}</label>
                                    <div class="@error('users.birthday') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="users.birthday" class="form-control"
                                            placeholder="ex: 23/12/2001" type="date" id="user-birthday">
                                    </div>
                                    @error('users.birthday')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-phone" class="form-control-label">{{ __('Phone') }}</label>
                                    <div class="@error('users.phone') border border-danger rounded-3 @enderror">
                                        <input  wire:model.debounce="users.phone"
                                            class="form-control" placeholder="ex: 08213121321" type="text"
                                            id="user-birthday">
                                    </div>
                                    @error('users.phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                    <div class="@error('users.email') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="users.email" class="form-control"
                                            placeholder="ex: example@gmail.com" type="email" id="user-email">
                                    </div>
                                    @error('users.email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-identity_card"
                                        class="form-control-label">{{ __('ID card') }}</label>
                                    <div class="@error('users.identity_card') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="users.identity_card" class="form-control"
                                            placeholder="1231123" type="text" id="user-identity_card">
                                    </div>
                                    @error('users.identity_card')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-location" class="form-control-label">{{ __('Address') }}</label>
                                    <div class="@error('users.location') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="users.location" class="form-control"
                                            placeholder="ex: Earth,..." type="email" id="user-location">
                                    </div>
                                    @error('users.location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-major" class="form-control-label">{{ __('Major') }}</label>
                                    <div class="@error('eduLevel.major') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="eduLevel.major" class="form-control"
                                            placeholder="ex: electronical and telecommunication,..." type="text"
                                            id="user-major">
                                    </div>
                                    @error('eduLevel.major')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-certificate"
                                        class="form-control-label">{{ __('Certificate') }}</label>
                                    <div
                                        class="@error('eduLevel.certificate') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="eduLevel.certificate" class="form-control"
                                            placeholder="ex: Bachelor, master,..." type="email"
                                            id="user-certificate">
                                    </div>
                                    @error('eduLevel.certificate')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="user-certificate"
                                        class="form-control-label">{{ __('Education level description') }}</label>
                                    <div
                                        class="@error('eduLevel.description') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="eduLevel.description" class="form-control"
                                            placeholder="ex: Bachelor, master,..." type="email"
                                            id="user-description">
                                    </div>
                                    @error('eduLevel.description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="user-department">{{ __('Department') }}</label>
                                    <div
                                        class="@error('users.department_id') border border-danger rounded-3 @enderror">
                                        <select wire:model.debounce="users.department_id" wire:ignore class="form-control"
                                            id="user-department">
                                            <option value="">
                                                Select department
                                            </option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('users.department_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="user-password"
                                        class="form-control-label">{{ __('Password') }}</label>
                                    <div class="@error('password') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="password" class="form-control"
                                            placeholder="********" type="password" id="user-password">
                                    </div>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="addUserButton" class="btn bg-gradient-primary" wire:click="store">Add
                        employee
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
