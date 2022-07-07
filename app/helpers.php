<?php

use App\Models\Department;

if (!function_exists('getDepartments')) {
    function getDepartments()
    {
        $departments = Department::all();
        return $departments;
    }
}
