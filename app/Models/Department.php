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
    public function employees()
    {
        return $this->hasMany(User::class);
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id')
            ->withDefault(
                [
                    'id' => '',
                    'name' => '',
                ]
            );
    }
    public function scopeName($query, $keyword): \Illuminate\Database\Eloquent\Builder
    {
        if ($keyword != '') return $query->where('name', 'like', '%' . $keyword . '%');
        return $query;
    }
    public function scopeAddress($query, $keyword): \Illuminate\Database\Eloquent\Builder
    {
        if ($keyword != '') return $query->where('address', 'like', '%' . $keyword . '%');
        return $query;
    }
    public function scopePhone($query, $keyword): \Illuminate\Database\Eloquent\Builder
    {
        if ($keyword != '') return $query->where('phone', 'like', '%' . $keyword . '%');
        return $query;
    }
    public function scopeManager($query, $keyword): \Illuminate\Database\Eloquent\Builder
    {
        if ($keyword != '') return $query->whereRelation('manager', 'name', 'like', '%' . $keyword . '%');
        return $query;
    }
}
