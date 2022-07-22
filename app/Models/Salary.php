<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'basic_salary',
        'cofficient',
        'allowance',
        'bonus',
    ];

    public function employee(){
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
