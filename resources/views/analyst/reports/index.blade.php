@extends('layouts.app')

@section('title', 'My Reports')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>My Reports</h2>

    <a href="{{ route('analyst.reports.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Submit Report
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="card shadow">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Submitted Reports</h5>
    </div>

    <div class="card-body">

        @if($reports->count())

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Submitted On</th>
                    <th width="230">Action</th>
                </tr>
            </thead>

            <tbody>

            @foreach($reports as $report)

                <tr>

                    <td>
                        <strong>{{ $report->title }}</strong>
                    </td>

                    <td>
                        {{ $report->task->title }}
                    </td>

                    <td>

                        @if($report->status == 'submitted')

                            <span class="badge bg-primary">
                                Submitted
                            </span>

                        @elseif($report->status == 'approved')

                            <span class="badge bg-success">
                                Approved
                            </span>

                        @elseif($report->status == 'rejected')

                            <span class="badge bg-danger">
                                Rejected
                            </span>

                            @if(!empty($report->manager_feedback))
                                <div class="mt-2">
                                    <small class="fw-bold text-danger">
                                        Manager Feedback:
                                    </small>

                                    <br>

                                    <small class="text-muted">
                                        {{ $report->manager_feedback }}
                                    </small>
                                </div>
                            @endif

                        @else

                            <span class="badge bg-secondary">
                                Draft
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ $report->created_at->format('d M Y') }}
                    </td>

                    <td>

                        <a href="{{ route('analyst.reports.show', $report) }}"
                           class="btn btn-info btn-sm">
                            View
                        </a>

                        @if($report->status != 'approved')

                            <a href="{{ route('analyst.reports.edit', $report) }}"
                               class="btn btn-warning btn-sm">

                                {{ $report->status == 'rejected' ? 'Edit & Resubmit' : 'Edit' }}

                            </a>

                            <form action="{{ route('analyst.reports.destroy', $report) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this report?');">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                            </form>

                        @endif

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        @else

            <div class="text-center py-4">
                <h5>No Reports Submitted Yet</h5>
                <p class="text-muted">
                    Submit your first report after completing a task.
                </p>
            </div>

        @endif

    </div>

</div>

@endsection