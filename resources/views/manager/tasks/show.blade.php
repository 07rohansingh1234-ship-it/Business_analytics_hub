@extends('layouts.app')

@section('title', 'Task Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Task Details</h2>

    <a href="{{ route('manager.tasks.index') }}" class="btn btn-secondary">
        ← Back
    </a>

</div>

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">{{ $task->title }}</h5>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="220">Title</th>
                <td>{{ $task->title }}</td>
            </tr>

            <tr>
                <th>Description</th>
                <td>{{ $task->description ?: 'No description provided.' }}</td>
            </tr>

            <tr>
                <th>Dataset</th>
                <td>{{ $task->dataset->title ?? 'N/A' }}</td>
            </tr>

            <tr>
                <th>Assigned To</th>
                <td>{{ $task->analyst->name ?? 'N/A' }}</td>
            </tr>

            <tr>
                <th>Assigned By</th>
                <td>{{ $task->manager->name ?? 'N/A' }}</td>
            </tr>

            <tr>
                <th>Priority</th>
                <td>
                    @if($task->priority == 'High')
                        <span class="badge bg-danger">High</span>
                    @elseif($task->priority == 'Medium')
                        <span class="badge bg-warning text-dark">Medium</span>
                    @else
                        <span class="badge bg-success">Low</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    @if($task->status == 'Completed')
                        <span class="badge bg-success">Completed</span>
                    @elseif($task->status == 'In Progress')
                        <span class="badge bg-primary">In Progress</span>
                    @else
                        <span class="badge bg-secondary">Pending</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>Due Date</th>
                <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
            </tr>

            <tr>
                <th>Remarks</th>
                <td>{{ $task->remarks ?? 'No remarks added.' }}</td>
            </tr>

            <tr>
                <th>Created At</th>
                <td>{{ $task->created_at->format('d M Y h:i A') }}</td>
            </tr>

        </table>

        <div class="mt-3">

            <a href="{{ route('manager.tasks.edit', $task) }}"
               class="btn btn-warning">
                Edit
            </a>

            <form action="{{ route('manager.tasks.destroy', $task) }}"
                  method="POST"
                  class="d-inline">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger"
                        onclick="return confirm('Delete this task?')">
                    Delete
                </button>

            </form>

        </div>

    </div>

</div>

@endsection