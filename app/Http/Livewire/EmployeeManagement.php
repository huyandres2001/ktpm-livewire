<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\EduLevel;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeManagement extends Component
{
    use WithPagination;

    public User $users;
    public User $showEmployee;
    public EduLevel $eduLevel;
    public $user_id = ''; //pass from job details, show assignee of that job
    public $password = '';
    public $searchName = '';
    public $searchPhone = '';
    public $searchLocation = '';
    public $searchEmail = '';
    public $filterDepartment = '';
    protected $paginationTheme = 'bootstrap';
    public function rules()
    {
        return [
            'users.name' => 'required',
            'users.email' =>  ['required', 'email', Rule::unique('users')->ignore($this->users)],
            'users.gender' => 'required',
            'users.birthday' => 'required',
            'users.phone' => ['required', Rule::unique('users')->ignore($this->users)],
            'users.identity_card' => ['required', Rule::unique('users')->ignore($this->users)],
            'users.location' => 'required',
            'eduLevel.major' => 'string|required',
            'eduLevel.certificate' => 'string|required',
            'eduLevel.description' => 'string',
            'users.department_id' => 'required',
            'password' => 'required|min:6',
        ];
    }

    public function render()
    {
        checkAuthenticatedUserPermission('users.read');
        if ($this->user_id != '') {
            $data['employees'] = User::where('id',$this->user_id)->paginate(10);
            return view('livewire.users.employee-management', $data);
        }
        $data['employees'] = User::with('department', 'jobs', 'positions', 'salary', 'eduLevel')
            ->where('id', '<>', auth()->user()->id);
        $data['employees'] = $data['employees']
            ->name($this->searchName)
            ->phone($this->searchPhone)
            ->location($this->searchLocation)
            ->email($this->searchEmail)
            ->department($this->filterDepartment)
            ->paginate(10);


        return view('livewire.users.employee-management', $data);
    }

    public function mount($id = '')
    {
        if ($id != NULL && $id != '') {
            $this->user_id = $id;
        }
        $this->users = new User();
        $this->showEmployee = new User();
        $this->eduLevel = $this->users->eduLevel;
    }
    public function updated($propertyName)
    {
        $this->user_id = '';
        $this->validateOnly($propertyName);
    }
    public function resetInputFields()
    {
        $this->users = new User();
        $this->eduLevel = $this->users->eduLevel;
    }
    public function show(User $user){
        $this->showEmployee = $user;
    }
    public function store()
    {
        checkAuthenticatedUserPermission('users.store');
        //create new user from validated data
        $validated = $this->validate();
        $createdUser = \App\Models\User::create($validated['users']);
        $createdUser->password = Hash::make($validated['password']);
        $createdUser->eduLevel()->create($validated['eduLevel']);
        $this->resetInputFields();
        if ($createdUser) {
            toastr()->success('Added new employee!');
        } else {
            toastr()->error('Something went wrong!');
        }
    }
    public function edit(User $user)
    {
        // \DB::enableQueryLog(); // Enable query log
        // Department::find(1)->employees;
        // // Your Eloquent query executed by using get()
        // dd(\DB::getQueryLog()); // Show results of log
        $this->users = $user;
        $this->eduLevel = $user->eduLevel;
    }
    public function update()
    {
        checkAuthenticatedUserPermission('users.update');
        $validated = $this->validate();
        //dd($validated);
        $user = $this->users;
        $success = $user->update($validated['users']);
        if ($success) {
            $this->reset('password');
            toastr()->success('Employee updated successfully!');
        } else {
            $this->reset('password');
            toastr()->error('Something went wrong!');
        }
    }
    public function delete($id)
    {
        checkAuthenticatedUserPermission('users.delete');
        if ($id == \Auth::user()->id) {
            toastr()->error('You cannot delete yourself!');
            return;
        }
        $user = User::find($id)->delete();
        if ($user) {
            toastr()->success('Deleted successfully!');
        } else {
            toastr()->error('Something went wrong!');
        }
    }
}
