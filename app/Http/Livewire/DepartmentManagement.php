<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;

class DepartmentManagement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    //search department
    public $searchName = '';
    public $searchAddress = '';
    public $searchPhone = '';
    public $searchManager = '';
    //show department
    public Department $showDepartment;
    //create department
    public Department $departments;
    public $manager = '';
    protected function rules()
    {
        return [
            'departments.name' => ['required', 'string',],
            'departments.address' => ['required', 'string',],
            'departments.phone' => ['required', 'string',],
            'manager' => ['required',],
        ];
    }

    public function mount()
    {
        $this->showDepartment = new Department();
        $this->departments = new Department();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        checkAuthenticatedUserPermission('departments.read');
        $departmentList = Department::with('employees', 'manager');
        $departmentList = $departmentList->name($this->searchName)
            ->orWhere->address($this->searchAddress)
            ->orWhere->phone($this->searchPhone)
            ->manager($this->searchManager);
        $departmentList = $departmentList->paginate(10);

        $employeeList = \App\Models\User::all();
        return view(
            'livewire.departments.department-management',
            [
                'departmentList' => $departmentList,
                'employeeList' => $employeeList,
            ]
        );
    }
    public function resetInputFields()
    {
        $this->manager = '';
        $this->departments = new Department();
    }
    public function show(Department $showDepartment)
    {
        checkAuthenticatedUserPermission('departments.read');
        $this->showDepartment = $showDepartment;
    }
    public function create()
    {
        $this->resetInputFields();
    }
    public function store()
    {
        checkAuthenticatedUserPermission('departments.create');
        $validated = $this->validate([
            'departments.name' => ['required', 'string',],
            'departments.address' => ['required', 'string',],
            'departments.phone' => ['required', 'string',],
            'manager' => ['required',],
        ]);
        $validated['departments']['manager_id'] = $this->manager;
        $createdDepartment = \App\Models\Department::create(
            $validated['departments']
        );
        $this->resetInputFields();
        if ($createdDepartment) {
            toastr()->success('New department created!');
        } else {
            toastr()->error('Something went wrong!');
        }
    }
    public function edit(Department $department)
    {
        $this->departments = $department;
        $this->manager = $department->manager->id;
    }
    public function update()
    {
        checkAuthenticatedUserPermission('departments.update');
        $validated = $this->validate([
            'departments.name' => ['required', 'string',],
            'departments.address' => ['required', 'string',],
            'departments.phone' => ['required', 'string',],
            'manager' => ['required',],
        ]);
        $validated['departments']['manager_id'] = $this->manager;
        $department = $this->departments;
        $success = $department->update($validated['departments']);
        if ($success) {
            toastr()->success('Department updated successfully!');
        } else {
            toastr()->error('Something went wrong!');
        }
    }
    public function delete(Department $department)
    {
        $success = \App\Models\Department::destroy($department->id);
        if ($success) {
            toastr()->success('Deleted successfully!');
        } else {
            toastr()->error('Something went wrong!');
        }
    }
}
