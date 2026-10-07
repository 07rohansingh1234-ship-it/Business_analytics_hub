<?php

namespace App\Http\Controllers\Analyst;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AnalystReportController extends Controller
{
    /**
     * Display all reports of the logged-in analyst.
     */
    public function index()
    {
        $reports = Report::with('task')
            ->where('created_by', Auth::id())
            ->latest()
            ->get();

        return view('analyst.reports.index', compact('reports'));
    }

    /**
     * Show report creation form.
     */
    public function create()
    {
        $tasks = Task::where('assigned_to', Auth::id())
            ->where('status', 'Completed')
            ->whereDoesntHave('report')
            ->get();

        return view('analyst.reports.create', compact('tasks'));
    }

    /**
     * Store a newly created report.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
    'task_id' => 'required|exists:tasks,id',
    'title' => 'required|string|max:255',
    'summary' => 'required|string',
    'recommendation' => 'required|string',
    'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
]);

$validated['created_by'] = Auth::id();
$validated['status'] = 'submitted';



        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request
                ->file('attachment')
                ->store('reports', 'public');
        }

        $validated['created_by'] = Auth::id();

        // matches your ENUM
        $validated['status'] = 'submitted';

        Report::create($validated);

        return redirect()
            ->route('analyst.reports.index')
            ->with('success', 'Report submitted successfully.');
    }

    /**
     * Display the specified report.
     */
    public function show(Report $report)
    {
        abort_if($report->created_by != Auth::id(), 403);

        return view('analyst.reports.show', compact('report'));
    }

    /**
     * Show edit form.
     */
    public function edit(Report $report)
    {
        abort_if($report->created_by != Auth::id(), 403);

        if ($report->status == 'approved') {
            return redirect()
                ->route('analyst.reports.index')
                ->with('error', 'Approved reports cannot be edited.');
        }

        return view('analyst.reports.edit', compact('report'));
    }

    /**
     * Update report.
     */
    public function update(Request $request, Report $report)
    {
        abort_if($report->created_by != Auth::id(), 403);

        if ($report->status == 'approved') {
            return redirect()
                ->route('analyst.reports.index')
                ->with('error', 'Approved reports cannot be edited.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'recommendation' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('attachment')) {

    if ($report->attachment) {
        Storage::disk('public')->delete($report->attachment);
    }

    $validated['attachment'] = $request
        ->file('attachment')
        ->store('reports', 'public');
}
        $validated['status'] = 'submitted';
$validated['manager_feedback'] = null;

$report->update($validated);

        return redirect()
            ->route('analyst.reports.index')
            ->with('success', 'Report updated successfully.');
    }

    /**
     * Delete report.
     */
    public function destroy(Report $report)
    {
        abort_if($report->created_by != Auth::id(), 403);

        if ($report->status == 'approved') {
            return redirect()
                ->route('analyst.reports.index')
                ->with('error', 'Approved reports cannot be deleted.');
        }

        $report->delete();

        return redirect()
            ->route('analyst.reports.index')
            ->with('success', 'Report deleted successfully.');
    }
}