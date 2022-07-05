<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'number_of_employees',
        'manager_id',
        'phone',
    ];
    public function employees(){
        return $this->hasMany(User::class);
    }
    public function manager(){
        return $this->belongsTo(User::class, 'manager_id', 'id' );
    }

}
