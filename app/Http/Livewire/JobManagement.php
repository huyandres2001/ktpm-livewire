<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\User;
use Livewire\Component;

class JobManagement extends Component
{
    public Job $showJob;
    public User $showEmployee;
    public function render()
    {
        $jobs = Job::with('employees', 'job_evaluations');
        $jobs = $jobs->paginate(10);
        return view('livewire.jobs.job-management', [
            'jobs' => $jobs,
        ]);
    }
    public function show(Job $job)
    {
        $this->showJob = $job;
        //dd($this->showJob);
    }
    public function mount()
    {
        $this->showJob = new Job();
        $this->showEmployee = new User();
    }
    public function assigneeProfile(User $user){
        return redirect()->route('employee-management', [
            'employees' => $user
        ]);
    }
}
