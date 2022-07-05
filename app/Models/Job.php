<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'note',
        'schedule',
        'job_evaluation_id',
    ];
    public function employees(){
        return $this->belongsToMany(User::class, 'employee_job','job_id', 'employee_id');
    }
    public function job_evaluation() {
        return $this->hasMany(JobEvaluation::class);
    }
}
