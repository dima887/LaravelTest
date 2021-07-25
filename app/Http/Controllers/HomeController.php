<?php

namespace App\Http\Controllers;


use App\Models\Department;
use App\Models\DepartmentStaff;
use App\Models\Staff;

class HomeController extends Controller
{
    public function index()
    {
        $data = Department::all();
        $staff = Staff::query()->with('departments')->orderBy('id')->get();
        $depStaff = DepartmentStaff::query()->with('department', 'staff')->get();

        return view('index', compact('data', 'staff', 'depStaff'));
    }
}
