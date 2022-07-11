<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeManagement extends Component
{
    use WithPagination;

    public $idDeleted;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data['users'] = User::with('department', 'jobs', 'positions', 'salary')->paginate(10);
        $data['messages'] = 'ok';
        return view('livewire.users.employee-management', $data);
    }
    public function delete($id)
    {
        if ($id == \Auth::user()->id) {
            session()->flash('error', 'You cannot delete yourself!');
        } else {
            User::find($id)->delete();
            session()->flash('success', 'Deleted successfully!');
        }
    }
}
