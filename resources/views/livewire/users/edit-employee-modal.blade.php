<div class="col-md-6">
        <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="editEmployeeModal" tabindex="-1" role="dialog"
         aria-labelledby="editEmployeeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="user-name"
                                           class="form-control-label">{{ __('Name') }}</label>
                                    <div class="@error('name') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="users.name"
                                               class="form-control" placeholder="Tom..."
                                               type="text" id="user-name">
                                    </div>
                                </div>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="user-gender">{{ __('Gender') }}</label>
                                    <div class="@error('gender') border border-danger rounded-3 @enderror">
                                        <select wire:model.debounce="users.gender" class="form-control" id="user-gender">
                                            <option selected>Select gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="user-birthday"
                                           class="form-control-label">{{ __('Birthday') }}</label>
                                    <div class="@error('birthday') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="users.birthday"
                                               class="form-control" placeholder="ex: 23/12/2001"
                                               type="date" id="user-birthday">
                                    </div>
                                    @error('birthday')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-phone"
                                           class="form-control-label">{{ __('Phone') }}</label>
                                    <div class="@error('phone') border border-danger rounded-3 @enderror">
                                        <input  wire:model.debounce="users.phone"
                                               class="form-control" placeholder="ex: 08213121321"
                                               type="text" id="user-birthday">
                                    </div>
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email"
                                           class="form-control-label">{{ __('Email') }}</label>
                                    <div class="@error('email') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="users.email"
                                               class="form-control" placeholder="ex: example@gmail.com"
                                               type="email" id="user-email">
                                    </div>
                                    @error('email')
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
                                    <div class="@error('identity_card') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="users.identity_card"
                                               class="form-control" placeholder="1231123"
                                               type="text" id="user-identity_card">
                                    </div>
                                    @error('identity_card')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-location"
                                           class="form-control-label">{{ __('Address') }}</label>
                                    <div class="@error('location') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="users.location"
                                               class="form-control" placeholder="ex: Earth,..."
                                               type="email" id="user-location">
                                    </div>
                                    @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-major"
                                           class="form-control-label">{{ __('Major') }}</label>
                                    <div class="@error('major') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="eduLevel.major"
                                               class="form-control"
                                               placeholder="ex: electronical and telecommunication,..."
                                               type="text" id="user-major">
                                    </div>
                                    @error('major')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-certificate"
                                           class="form-control-label">{{ __('Certificate') }}</label>
                                    <div class="@error('certificate') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="eduLevel.certificate"
                                               class="form-control" placeholder="ex: Bachelor, master,..."
                                               type="email" id="user-certificate">
                                    </div>
                                    @error('certificate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="user-department">{{ __('Department') }}</label>
                                    <div class="@error('department_id') border border-danger rounded-3 @enderror">
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
                                    @error('department_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="user-password"
                                           class="form-control-label">{{ __('Password') }}</label>
                                    <div class="@error('password') border border-danger rounded-3 @enderror">
                                        <input wire:model.debounce="password"
                                               class="form-control" placeholder="********"
                                               type="password" id="user-password">
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
                    <button type="button" id="addUserButton" class="btn bg-gradient-primary" wire:click="update">Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
