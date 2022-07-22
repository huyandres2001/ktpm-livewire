<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\User;
use Livewire\Component;

use App\Models\EduLevel;
use Illuminate\Validation\Rule;

class UserProfile extends Component
{
    public User $users;
    public EduLevel $eduLevel;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;

    protected function rules()
    {
        return [
            'users.name' => 'max:40|min:3',
            'users.email' => ['email:rfc,dns', 'required', Rule::unique('users')->ignore($this->users)],
            'users.phone' => ['max:10', 'required', Rule::unique('users')->ignore($this->users)],
            'users.about' => 'max:200',
            'users.location' => 'min:3',
            'users.identity_card' => ['string', 'required', 'min:5', 'max:20', Rule::unique('users')->ignore($this->users)],
            'users.gender' => 'string|required',
            'users.department_id' => 'required',
            'eduLevel.major' => 'required',
            'eduLevel.certificate' => 'required',
            'eduLevel.description' => 'string',
            'users.birthday' => 'required',
        ];
    }

    public function mount()
    {
        $this->users = auth()->user();
        $this->eduLevel = $this->users->eduLevel;
    }

    public function save()
    {
        if (env('IS_DEMO')) {
            $this->showDemoNotification = true;
        } else {
            $this->validate();
            $this->users->save();
            $this->users->eduLevel()->updateOrCreate(
                ['employee_id' => $this->users->id],
                [
                    'major' => $this->eduLevel->major,
                    'certificate' => $this->eduLevel->certificate,
                    'description' => $this->eduLevel->description,
                ]
            );
            $this->showSuccesNotification = true;
        }
    }
    public function render()
    {

        return view('livewire.laravel-examples.user-profile');
    }
}
