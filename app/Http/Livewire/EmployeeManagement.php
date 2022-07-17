<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeManagement extends Component
{
    use WithPagination;

    public User $user;
    protected $user_id;
    public $phone = '';
    public $name = '';
    public $email = '';
    public $gender = '';
    public $birthday = '';
    public $identity_card = '';
    public $location = '';
    public $major = '';
    public $certificate = '';
    public $department_id = '';
    public $salary_id = '';
    public $password = '';

    protected $paginationTheme = 'bootstrap';

    public function rules()
    {

        return [
            'name' => 'required',
            'email' =>  ['required', 'email', Rule::unique('users')->ignore($this->user)],
            'gender' => 'required',
            'birthday' => 'required',
            'phone' => ['required', Rule::unique('users')->ignore($this->user)],
            'identity_card' => ['required', Rule::unique('users')->ignore($this->user)],
            'location' => 'required',
            'major' => 'string',
            'certificate' => 'string',
            'department_id' => 'required',
            'salary_id' => 'required',
            'password' => 'required|min:6',
        ];
    }

    public function render()
    {
        $data['users'] = User::with('department', 'jobs', 'positions', 'salary')
            ->where('id', '<>', auth()->user()->id)->paginate(10);
        $data['messages'] = 'ok';
        return view('livewire.users.employee-management', $data);
    }

    public function mount()
    {
        $this->user = new User();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {
        if (!(auth()->user()->can('users.create'))) {
            toastr()->warning('You do not have permission to do that!');
        } else {
            //create new user from validated data
            //dd($this->validate());
            $this->validate();
            $success = \App\Models\User::create([
                'name' => $this->name,
                'email' => $this->email,
                'gender' => $this->gender,
                'birthday' => $this->birthday,
                'phone' => $this->phone,
                'identity_card' => $this->identity_card,
                'location' => $this->location,
                'major' => $this->major,
                'certificate' => $this->certificate,
                'department_id' => $this->department_id,
                'salary_id' => $this->salary_id,
                'password' => Hash::make($this->password),
            ]);
            //reset input field
            $this->reset([
                'name',
                'email',
                'gender',
                'birthday',
                'phone',
                'identity_card',
                'location',
                'major',
                'certificate',
                'department_id',
                'salary_id',
                'password',
            ]);
            if ($success) {
                toastr()->success('Added new employee!');
            } else {
                toastr()->error('Something went wrong!');
            }
        }
    }

    public function edit(User $user)
    {
        $this->user = $user;
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->gender = $user->gender;
        $this->birthday = $user->birthday;
        $this->identity_card = $user->identity_card;
        $this->location = $user->location;
        $this->major = $user->major;
        $this->certificate = $user->certificate;
        $this->department_id = $user->department_id;
        $this->salary_id = $user->salary_id;
    }

    public function update()
    {
        if (!auth()->user()->can('users.update')) {
            toastr()->warning('You do not have permission to do that!');
        } else {
            $validated = $this->validate();
            //dd($validated);
            $user = $this->user;
            $success = $user->update($validated);
            if ($success) {
                $this->reset('password');
                toastr()->success('Employee updated successfully!');
            } else {
                toastr()->error('Something went wrong!');
            }
        }

    }
    public function delete($id)
    {
        if ($id == \Auth::user()->id) {
            toastr()->error('You cannot delete yourself!');
        } else {
            User::find($id)->delete();
            toastr()->success('Deleted successfully!');
        }
    }
}
