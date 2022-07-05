<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEvaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'progress',
        'status',
        'kpi',
    ];
    public function job(){
        return $this->belongsTo(Job::class,'job_evaluation_id', 'id');
    }
}
