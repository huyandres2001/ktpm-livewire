<div class="modal fade" wire:ignore.self id="showDepartmentModal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Department details</h6>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Name: <p> {{ $showDepartment->name }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Phone: <p> {{ $showDepartment->phone }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Manager:</h5>
                        {{-- <p>{{ $showDepartment->manager->name }}</p> --}}
                        <a href="{{ route('employee-management', ['id' => $showDepartment->manager->id]) }}"
                            target="_blank">{{ $showDepartment->manager->name }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Address: <p> {{ $showDepartment->address }}</p>
                        </h5>
                    </div>
                    <div class="col-md-4">
                        <h5>Number of employees:</h5>
                        <p>{{ $showDepartment->employees->count() }}</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Total salary:</h5>
                        <p>{{ currencyForm(totalSalaryOfDepartment($showDepartment)) }} USD</p>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
