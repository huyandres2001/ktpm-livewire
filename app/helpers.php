<?php


use App\Models\Department;
use App\Models\User;

if (!function_exists('getAllDepartments')) {
    function getAllDepartments(): \Illuminate\Database\Eloquent\Collection
    {
        return Department::all();
    }
}
if (!function_exists('final_salary')) {
    function final_salary(User $user)
    {
        return $user->salary->basic_salary * $user->salary->cofficient + $user->salary->allowance + $user->salary->bonus;
    }
}
