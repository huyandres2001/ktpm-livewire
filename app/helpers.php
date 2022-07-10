<?php


use App\Models\Department;

if (!function_exists('getAllDepartments')) {
    function getAllDepartments(): \Illuminate\Database\Eloquent\Collection
    {
        return Department::all();
    }
}
