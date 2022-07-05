<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'basic_salary',
        'cofficient',
        'allowance',
        'bonus',
    ];

    public function employees(){
        return $this->hasMany(User::class, 'salary_id', 'id');
    }
}
