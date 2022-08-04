<div class="modal  fade" wire:ignore.self id="showEmployeeModal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Employee details</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Name: <p> {{ $showEmployee->name }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Gender: <p> {{ $showEmployee->gender }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Phone: <p> {{ $showEmployee->phone }}</p>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Email: <p> {{ $showEmployee->email }}</p>
                        </h5>
                    </div>
                    <div class="col-md-8">
                        <h5>Address: <p> {{ $showEmployee->location }}</p>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Id Card: <p> {{ $showEmployee->identity_card }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Birthday: <p> {{ $showEmployee->birthday }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Department: <p> {{ $showEmployee->department->name }}</p>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Major: <p> {{ $showEmployee->eduLevel->major }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Certificate: <p> {{ $showEmployee->eduLevel->certificate }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Edu level description: <p> {{ $showEmployee->eduLevel->description }}</p>
                        </h5>
                    </div>

                </div>
                {{-- <div class="row">
                    <div class="col-md">
                        <h5>Description:</h5>
                        <p>{{ $showJob->description }}</p>
                    </div>
                </div>
                <div class="row">
                    <h5>Assignee:</h5>
                    @foreach ($showJob->employees as $assignee)
                        <div class="col-md-3">
                            <a href="#"  wire:click="assigneeProfile({{$assignee->id}})">{{ $assignee->name }}</a>
                        </div>
                    @endforeach
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
