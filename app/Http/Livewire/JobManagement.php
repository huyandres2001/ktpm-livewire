<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\JobEvaluation;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class JobManagement extends Component
{
    use WithPagination;

    public \App\Models\Job $showJob; //show job details
    public User $showEmployee;
    public \App\Models\Job $jobs; //for updating and creating job
    //search job
    public $searchName = '';
    public $searchAssignee = '';
    public $scheduleStartDate = '';
    public $scheduleEndDate = '';
    public $createdStartDate = '';
    public $createdEndDate = '';
    //assign job show modal
    public \App\Models\Job $assignJob;
    //search assignee
    public $searchAssigneeName = '';
    public $searchAssigneePhone = '';
    public $searchAssigneeEmail = '';
    public $filterAssigneeDepartment = '';
    public $filterAssigneeStatus = '';
    //assignment form
    public $toggleAssignmentForm = false;
    public $employee_job; //for validating assignment form
    public User $assigneeToAssign;
    public Job $jobToAssign;

    //job evaluation
    public Job $jobToBeEvaluated;
    public JobEvaluation $job_evaluations;

    protected $paginationTheme = 'bootstrap';
    protected function rules()
    {
        return [
            'jobs.name' => ['required', 'string',],
            'jobs.description' => ['required', 'string',],
            'jobs.note' => ['string',],
            'jobs.schedule' => ['required',],
            'employee_job.deadline' => ['required',],
            'employee_job.requirements' => ['required',],
            'job_evaluations.progress' => ['required',],
            'job_evaluations.status' => ['required',],
            'job_evaluations.kpi' => ['required',],
        ];
    }
    public function render()
    {
        checkAuthenticatedUserPermission('jobs.read');
        //\DB::enableQueryLog(); // Enable query log
        // Your Eloquent query executed by using get()
        //dd(explode(',', $this->searchAssignee));
        $jobsList = Job::with('employees', 'job_evaluations');
        $jobsList = $jobsList->name($this->searchName)
            ->orWhere->assignee($this->searchAssignee)
            ->schedule($this->scheduleStartDate, $this->scheduleEndDate)
            ->createdDate($this->createdStartDate, $this->createdEndDate);
        //dd(\DB::getQueryLog()); // Show results of log
        $jobsList = $jobsList->paginate(10);

        //search assignee in job assignment
        $employees = User::with('department');
        $employees->name($this->searchAssigneeName)
            ->orWhere->email($this->searchAssigneeEmail)
            ->orWhere->phone($this->searchAssigneePhone)
            ->department($this->filterAssigneeDepartment);
        $employees = $employees->get();
        return view('livewire.jobs.job-management', [
            'jobsList' => $jobsList,
            'employees' => $employees
        ]);
    }
    public function show(\App\Models\Job $job)
    {
        checkAuthenticatedUserPermission('jobs.read');
        $this->showJob = $job;
        //dd($this->showJob);
    }
    public function mount()
    {
        $this->jobs = new \App\Models\Job();
        $this->showJob = new \App\Models\Job();
        $this->assignJob = new \App\Models\Job();
        $this->showEmployee = new User();
        $this->jobToBeEvaluated = new \App\Models\Job();
        $this->job_evaluations = new JobEvaluation();
    }
    public function assigneeProfile(User $user)
    {
        return redirect()->route('employee-management', [
            'employees' => $user
        ]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function resetInputFields()
    {
        $this->jobs = new \App\Models\Job();
        $this->job_evaluations = new JobEvaluation();
        $this->employee_job = '';
    }
    public function store()
    {
        checkAuthenticatedUserPermission('jobs.create');
        $validated = $this->validate();
        $createdJob = \App\Models\Job::create($validated['jobs']);
        $this->resetInputFields();
        if ($createdJob) {
            toastr()->success('New job created!');
        } else {
            toastr()->error('Something went wrong!');
        }
    }
    public function edit(\App\Models\Job $job)
    {
        checkAuthenticatedUserPermission('jobs.update');
        $this->jobs = $job;
    }
    public function update()
    {
        checkAuthenticatedUserPermission('jobs.update');
        $validated = $this->validate();
        $job = $this->jobs;
        $success = $job->update($validated['jobs']);
        if ($success) {
            toastr()->success('Job updated successfully!');
        } else {
            toastr()->error('Something went wrong!');
        }
    }
    public function delete(\App\Models\Job $job)
    {
        checkAuthenticatedUserPermission('jobs.delete');
        $success = \App\Models\Job::destroy($job->id);
        if ($success) {
            toastr()->success('Deleted successfully!');
        } else {
            toastr()->error('Something went wrong!');
        }
    }
    public function assignJobModal(\App\Models\Job $job) //show modal and pass parameter
    {
        $this->assignJob = $job;
    }
    public function toggleAssignmentForm(User $assignee, Job $assignJob) //toggle assignment form to assign job to an employee
    {
        $this->toggleAssignmentForm = true;
        $this->assigneeToAssign = $assignee;
        $this->jobToAssign = $assignJob;
    }
    public function assignJob(User $assignee, Job $jobNeedToAssign)
    {
        checkAuthenticatedUserPermission('jobs.assign');
        $jobNeedToAssign->employees()->attach($assignee->id, [
            'assigned_day' => Carbon::now()->format('Y-m-d'),
            'deadline' => $this->employee_job['deadline'],
            'requirements' => $this->employee_job['requirements'],
        ]);
        $this->resetInputFields();
        $this->toggleAssignmentForm = false;
        toastr()->success('Job ' . $this->assignJob->name . ' assigned to ' . $assignee->name . '!');
    }
    public function unassignJob(User $assignee, Job $jobNeedToUnassign)
    {
        checkAuthenticatedUserPermission('jobs.assign');
        $success = $jobNeedToUnassign->employees()->detach($assignee->id);
        if ($success) {
            toastr()->info('Job ' . $this->assignJob->name . ' unassigned from ' . $assignee->name . '!');
        } else {
            toastr()->error('Something went wrong');
        }
    }
    public function showJobEvaluateModal(Job $jobToBeEvaluated)
    {
        $this->jobToBeEvaluated = $jobToBeEvaluated;
    }
    public function addJobEvaluation()
    {
        checkAuthenticatedUserPermission('jobs.evaluate');
        $validated = $this->validate([
            'job_evaluations.progress' => ['required',],
            'job_evaluations.status' => ['required',],
            'job_evaluations.kpi' => ['required',],
        ]);
        $success =  $this->jobToBeEvaluated->job_evaluations()->create($validated['job_evaluations']);
        if ($success) {
            toastr()->success('Job evaluation for ' . $this->jobToBeEvaluated->name . ' is created!');
            $this->resetInputFields();
        } else {
            toastr()->error('Something went wrong');
        }
    }
}
