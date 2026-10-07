<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Dataset;
use App\Models\User;
use App\Models\Task;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ManagerDashboardController extends Controller
{
    public function index()
{
    $analysts = User::where('role', 'analyst')->count();
 $managerId = Auth::id();
    $datasetCount = Dataset::count();

    $pendingTasks = Task::where('assigned_by', $managerId)
                        ->where('status', 'pending')
                        ->count();
    $completedTasks =Task::where('assigned_by',$managerId)->where('status','completed')->count();
    $reports = Report::count();
    $recentAnalysts = User::with('department')
        ->where('role', 'analyst')
        ->latest()
        ->take(5)
        ->get();

    $recentDatasets = Dataset::latest()
        ->take(5)
        ->get();

     $recentTasks = Task::with(['analyst', 'dataset'])
                        ->where('assigned_by', $managerId)
                        ->latest()
                        ->take(5)
                        ->get();
    return view('manager.dashboard', compact(
        'analysts',
        'datasetCount',
        'pendingTasks',
        'completedTasks',
        'reports',
        'recentTasks',
        'recentAnalysts',
        'recentDatasets'
    ));
}
}