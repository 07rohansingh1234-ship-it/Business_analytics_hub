@extends('layouts.app')

@section('title','View Report')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <h4>{{ $report->title }}</h4>

    </div>

    <div class="card-body">

        <table class="table">

            <tr>
                <th width="180">Task</th>
                <td>{{ $report->task->title }}</td>
            </tr>

            <tr>
                <th>Analyst</th>
                <td>{{ $report->creator->name }}</td>
            </tr>

            <tr>
                <th>Status</th>

                <td>

                    @if($report->status=='submitted')

                        <span class="badge bg-warning text-dark">
                            Submitted
                        </span>

                    @elseif($report->status=='approved')

                        <span class="badge bg-success">
                            Approved
                        </span>

                    @elseif($report->status=='rejected')

                        <span class="badge bg-danger">
                            Rejected
                        </span>

                    @endif

                </td>

            </tr>

        </table>

        <hr>

        <h5>Summary</h5>

        <p>{{ $report->summary }}</p>

        <hr>

        <h5>Recommendation</h5>

        <p>{{ $report->recommendation }}</p>

        <hr>

        <h5>Attachment</h5>

        @if($report->attachment)

            <a href="{{ asset('storage/'.$report->attachment) }}"
               target="_blank"
               class="btn btn-outline-primary">

                Download Attachment

            </a>

        @else

            <span class="text-muted">

                No attachment uploaded.

            </span>

        @endif

        <hr>

       @if($report->status=='submitted')

<div class="card mt-4">

    <div class="card-header">
        <strong>Review Report</strong>
    </div>

    <div class="card-body">

        <form action="{{ route('manager.reports.approve',$report) }}"
              method="POST"
              class="mb-3">

            @csrf
            @method('PATCH')

            <button class="btn btn-success">
                Approve Report
            </button>

        </form>

        <hr>

        <form action="{{ route('manager.reports.reject',$report) }}"
              method="POST">

            @csrf
            @method('PATCH')

            <div class="mb-3">

                <label class="form-label">
                    Rejection Feedback
                </label>

                <textarea
                    name="manager_feedback"
                    class="form-control"
                    rows="4"
                    placeholder="Explain why the report is being rejected..."
                    required></textarea>

            </div>

            <button class="btn btn-danger">
                Reject Report
            </button>

        </form>

    </div>

</div>

@endif
    </div>

</div>

@endsection