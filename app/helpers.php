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
if (!function_exists('currencyForm')) {
    function currencyForm($number): string
    {
        return number_format($number, 0, ".", ",");
    }
}
if (!function_exists('checkAuthenticatedUserPermission')) {
    function checkAuthenticatedUserPermission($permission)
    {
        if(!auth()->user()->can($permission))
        {
            toastr()->warning('You do not have permission to do that!');
            return;
        }
    }
}
