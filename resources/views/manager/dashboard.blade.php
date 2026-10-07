@extends('layouts.app')

@section('title','Manager Dashboard')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Manager Dashboard</h2>

    <!-- Statistics -->
    <div class="row">

        <div class="col-md-2 mb-3">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    <h6>Total Analysts</h6>
                    <h2>{{ $analysts }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    <h6>Datasets</h6>
                    <h2>{{ $datasetCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="card bg-warning text-dark shadow">
                <div class="card-body text-center">
                    <h6>Pending Tasks</h6>
                    <h2>{{ $pendingTasks }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="card bg-info text-white shadow">
                <div class="card-body text-center">
                    <h6>Completed</h6>
                    <h2>{{ $completedTasks }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-2 mb-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body text-center">
                    <h6>Reports</h6>
                    <h2>{{ $reports }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Recent Analysts -->
    <div class="card shadow mb-4">
        <div class="card-header bg-dark text-white">
            Recent Analysts
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                </tr>

                </thead>

                <tbody>

                @forelse($recentAnalysts as $analyst)

                <tr>
                    <td>{{ $analyst->name }}</td>
                    <td>{{ $analyst->email }}</td>
                    <td>{{ $analyst->department->name ?? '-' }}</td>
                </tr>

                @empty

                <tr>
                    <td colspan="3" class="text-center">
                        No Analysts Found
                    </td>
                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Recent Tasks -->
    <div class="card shadow mb-4">

      <div class="card-body">

    @if($recentTasks->isNotEmpty())

        <table class="table table-bordered table-hover">

            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Assigned By</th>
                    <th>Assigned To</th>
                    <th>Dataset</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Created At</th>
                </tr>
            </thead>

            <tbody>

                @foreach($recentTasks as $task)

                    <tr>

                        <td>{{ $task->title }}</td>

                        <td>{{ $task->description }}</td>

                        <td>{{ $task->manager->name }}</td>

                        <td>{{ $task->analyst->name }}</td>

                        <td>{{ $task->dataset->title }}</td>

                        <td>
                            <span class="badge
                                @if($task->priority == 'High') bg-danger
                                @elseif($task->priority == 'Medium') bg-warning text-dark
                                @else bg-success
                                @endif">
                                {{ $task->priority }}
                            </span>
                        </td>

                        <td>
                            <span class="badge
                                @if($task->status == 'Completed') bg-success
                                @elseif($task->status == 'In Progress') bg-primary
                                @else bg-secondary
                                @endif">
                                {{ $task->status }}
                            </span>
                        </td>

                        <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>

                        <td>{{ $task->created_at->format('d M Y') }}</td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <div class="text-center text-muted py-3">
            No Tasks Assigned Yet.
        </div>

    @endif

</div>

    </div>

    <!-- Recent Dataset Uploads -->

    <div class="card shadow mb-4">

        <div class="card-header bg-success text-white">
            Recent Dataset Uploads
        </div>

        <div class="card shadow mb-4">
   

    <div class="card-body">
        @if($recentDatasets->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Uploaded On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentDatasets as $dataset)
                        <tr>
                            <td>{{ $dataset->title }}</td>
                            <td>{{ $dataset->type }}</td>
                            <td>{{ $dataset->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center text-muted">
                No Datasets Uploaded
            </div>
        @endif
    </div>
</div>
</div>

    </div>

    <!-- AI Insights -->

    <div class="card shadow mb-4">

        <div class="card-header bg-primary text-white">

            AI Insights

        </div>

        <div class="card-body">

            <ul>

                <li>No AI Insights Generated Yet.</li>

                <li>Insights will appear after datasets are uploaded.</li>

                <li>Reports and trends will be displayed here.</li>

            </ul>

        </div>

    </div>

    <!-- Upcoming Deadlines -->

    <div class="card shadow">

        <div class="card-header bg-warning">

            Upcoming Deadlines

        </div>

        <div class="card-body text-center text-muted">

            No Upcoming Deadlines

        </div>
       
    </div>

</div>

@endsection