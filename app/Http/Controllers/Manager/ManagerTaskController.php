<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Models\Dataset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerTaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['dataset', 'manager', 'analyst'])
                ->where('assigned_by', Auth::id())
                ->latest()
                ->get();

    return view('manager.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $datasets = Dataset::all();

        $analysts = User::where('role','analyst')->get();

        return view('manager.tasks.create', compact(
            'datasets',
            'analysts'
        ));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'dataset_id' => 'required|exists:datasets,id',
        'assigned_to' => 'required|exists:users,id',
        'priority' => 'required|in:low,medium,high',
        'due_date' => 'required|date|after_or_equal:today',
    ]);

    $validated['assigned_by'] = auth()->id();

    $validated['status'] = 'Pending';

    Task::create($validated);

    return redirect()
        ->route('manager.tasks.index')
        ->with('success', 'Task assigned successfully.');
}

    public function show(Task $task)
{
    return view('manager.tasks.show', compact('task'));
}

    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        //
    }
}