<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function employees()
    {
        return $this->belongsToMany(User::class, 'employee_job', 'job_id', 'employee_id');
    }
    public function job_evaluations()
    {
        return $this->hasMany(JobEvaluation::class, 'job_id', 'id');
    }
    public function scopeName($query, $keyword): \Illuminate\Database\Eloquent\Builder
    {
        if ($keyword != '') return $query->where('name', 'like', '%' . $keyword . '%');
        return $query;
    }
    public function scopeAssignee($query, $keyword): \Illuminate\Database\Eloquent\Builder
    {
        if ($keyword != '') {
            $keywordArray = explode(',', $keyword);
            // return $query->whereHas('employees', function (Builder $query) use ($keyword) {
            //     $query->where('name', 'like', '%' . $keyword . '%');
            // });
            foreach ($keywordArray as $keyword) {
                $query->whereRelation('employees', 'name', 'like', '%' . $keyword . '%');
            }
            return $query;
        }
        return $query;
    }
    public function scopeSchedule($query, $startDate, $endDate): \Illuminate\Database\Eloquent\Builder
    {
        if ($startDate != '' && $endDate != '') {
            return $query->whereBetween('schedule', [$startDate, $endDate]);
        }
        return $query;
    }
    public function scopeCreatedDate($query, $startDate, $endDate): \Illuminate\Database\Eloquent\Builder
    {
        if ($startDate != '' && $endDate != '') {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        }
        return $query;
    }
}
