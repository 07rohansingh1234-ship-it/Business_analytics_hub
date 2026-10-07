<?php

namespace App\Http\Controllers\Analyst;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalystTaskController extends Controller
{
    /**
     * Display all tasks assigned to the logged-in analyst.
     */
    public function index()
    {
        $tasks = Task::with(['dataset', 'manager'])
            ->where('assigned_to', Auth::id())
            ->latest()
            ->get();

        return view('analyst.tasks.index', compact('tasks'));
    }

    /**
     * Display the specified task.
     */
    public function show(Task $task)
    {
        if ($task->assigned_to != Auth::id()) {
            abort(403);
        }

        return view('analyst.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the task.
     */
    public function edit(Task $task)
    {
        if ($task->assigned_to != Auth::id()) {
            abort(403);
        }

        return view('analyst.tasks.edit', compact('task'));
    }

    /**
     * Update task status and remarks.
     */
    public function update(Request $request, Task $task)
    {
        if ($task->assigned_to != Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:Pending,In Progress,Completed',
            'remarks' => 'nullable|string',
        ]);

        $task->update($validated);

        return redirect()
            ->route('analyst.tasks.index')
            ->with('success', 'Task updated successfully.');
    }
}