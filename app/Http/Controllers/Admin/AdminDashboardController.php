<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use App\Models\Dataset;
use App\Models\Report;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $departmentCount = Department::count();
        $userCount = User::count();
        $datasetCount=Dataset::count();
        $reportCount= Report::count();

        // Recent Departments
        $departments = Department::all();

        // Recent Users
        $users = User::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'departmentCount',
            'userCount',
            'departments',
            'users',
            'datasetCount',
            'reportCount'
        ));
    }
}