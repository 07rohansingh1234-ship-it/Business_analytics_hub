<?php

namespace App\Http\Controllers\Analyst;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class AnalystDashboardController extends Controller
{
    public function index()
    {
        $analystId = Auth::id();

        $totalTasks = Task::where('assigned_to', $analystId)->count();

        $pendingTasks = Task::where('assigned_to', $analystId)
                            ->where('status', 'Pending')
                            ->count();

        $inProgressTasks = Task::where('assigned_to', $analystId)
                               ->where('status', 'In Progress')
                               ->count();

        $completedTasks = Task::where('assigned_to', $analystId)
                              ->where('status', 'Completed')
                              ->count();

        $recentTasks = Task::with(['dataset', 'manager'])
                            ->where('assigned_to', $analystId)
                            ->latest()
                            ->take(5)
                            ->get();

        return view('analyst.dashboard', compact(
            'totalTasks',
            'pendingTasks',
            'inProgressTasks',
            'completedTasks',
            'recentTasks'
        ));
    }
}