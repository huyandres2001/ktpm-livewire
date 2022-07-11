<div class="main-content">
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white"><strong>Add, Edit, Delete features are not functional!</strong> This is a
            <strong>PRO</strong> feature!
            Click <strong><a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank"
                             class="text-white">here</a></strong>
            to see the PRO
            product!</span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Employees</h5>
                        </div>
                        @can('users.create')
                            {{--                            <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">--}}
                            {{--                                +&nbsp;Message Modal--}}
                            {{--                            </button>--}}
                            @include('livewire.users.create-employee-modal')
                            <button class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal"
                                    data-bs-target="#createEmployeeModal">+&nbsp; New Employee
                            </button>
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
                                {{--                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">--}}
                                {{--                                    Photo--}}
                                {{--                                </th>--}}
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Name
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Gender
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Birthday
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Phone
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Email
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Address
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    department
                                </th>
                                @hasrole('admin')
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ID card
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Major
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    certificate
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    salary
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                                @endhasrole
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->id}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->name}}</p>
                                    </td>
                                    <td class="text-center">
                                        <i class="{{ $user->gender == 'male' ? 'fa fa-mars' : 'fa fa-venus'}}"></i>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->birthday}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->phone}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->email}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{Str::limit($user->location,10, $end = '...')}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{Str::limit($user->department->name,20, $end = '...')}}</p>
                                    </td>
                                    @role('admin')
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{Str::limit($user->identity_card,3, $end = '...')}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{Str::limit($user->major,20, $end = '...')}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{Str::limit($user->certificate,20, $end = '...')}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{final_salary($user)}}</p>
                                    </td>
                                    <td class="text-center">
                                        <button href="#" class="mx-3" id="editEmployee"
                                                style="border: none;padding: 0;background: none;" data-bs-toggle="modal"
                                                data-bs-target="#editEmployeeModal"
                                                data-bs-original-title="Edit Employee">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </button>
                                        <button href="#"
                                                onclick="javascript:return confirm('Are you sure you want to delete?')"
                                                wire:click.prevent="delete({{$user->id}})"
                                                class="mx-3"
                                                id="deleteEmployee"
                                                style="border: none;padding: 0;background: none;"
                                                data-bs-original-title="Delete Employee">
                                            <i class="fas fa-trash text-secondary"></i>
                                        </button>

                                    </td>
                                    @include('livewire.users.edit-employee-modal', [$user->id])
                                    @endrole
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{$users->links()}}
</div>

