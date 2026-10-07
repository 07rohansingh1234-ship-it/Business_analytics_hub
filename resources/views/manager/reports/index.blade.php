@extends('layouts.app')

@section('title','Reports')

@section('content')

<div class="card shadow">

    <div class="card-header bg-dark text-white">
        <h4 class="mb-0">Submitted Reports</h4>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-hover">

            <thead class="table-light">

                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Analyst</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Submitted On</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

            @forelse($reports as $report)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $report->task->title }}</td>

                    <td>{{ $report->creator->name }}</td>

                    <td>{{ $report->title }}</td>

                    <td>

                        @if($report->status=='submitted')
                            <span class="badge bg-warning text-dark">Submitted</span>

                        @elseif($report->status=='approved')
                            <span class="badge bg-success">Approved</span>

                        @elseif($report->status=='rejected')
                            <span class="badge bg-danger">Rejected</span>

                        @else
                            <span class="badge bg-secondary">{{ ucfirst($report->status) }}</span>
                        @endif

                    </td>

                    <td>{{ $report->created_at->format('d M Y') }}</td>

                    <td>

                        <a href="{{ route('manager.reports.show',$report) }}"
                           class="btn btn-primary btn-sm">

                            View

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No reports submitted yet.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        {{ $reports->links() }}

    </div>

</div>

@endsection