<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
class ManagerReportController extends Controller
{
    public function index()
    {
        $reports = Report::with(['creator', 'task'])
            ->latest()
            ->paginate(10);

        return view('manager.reports.index', compact('reports'));
    }

    public function show(Report $report)
    {
        $report->load(['creator', 'task']);

        return view('manager.reports.show', compact('report'));
    }

   public function approve(Report $report)
{
    $report->update([
        'status' => 'approved',
        'manager_feedback' => null,
    ]);

    return redirect()
        ->route('manager.reports.index')
        ->with('success', 'Report approved successfully.');
}

   public function reject(Request $request, Report $report)
{
    $request->validate([
        'manager_feedback' => 'required|string|max:1000',
    ]);

    $report->update([
        'status' => 'rejected',
        'manager_feedback' => $request->manager_feedback,
    ]);

    return redirect()
        ->route('manager.reports.index')
        ->with('success', 'Report rejected successfully.');
}
}