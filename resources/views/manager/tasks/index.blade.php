@extends('layouts.app')

@section('title', 'Task Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Task Management</h2>

    <a href="{{ route('manager.tasks.create') }}" class="btn btn-primary">
        + Assign New Task
    </a>

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Title</th>

                    <th>Dataset</th>

                    <th>Assigned To</th>

                    <th>Priority</th>

                    <th>Status</th>

                    <th>Due Date</th>

                    <th width="220">Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($tasks as $task)

                    <tr>

                        <td>{{ $task->id }}</td>

                        <td>{{ $task->title }}</td>

                        <td>{{ $task->dataset->title }}</td>

                        <td>{{ $task->analyst->name }}</td>

                        <td>

                            @if($task->priority == 'High')

                                <span class="badge bg-danger">
                                    High
                                </span>

                            @elseif($task->priority == 'Medium')

                                <span class="badge bg-warning text-dark">
                                    Medium
                                </span>

                            @else

                                <span class="badge bg-success">
                                    Low
                                </span>

                            @endif

                        </td>

                        <td>

                            @if($task->status == 'Completed')

                                <span class="badge bg-success">
                                    Completed
                                </span>

                            @elseif($task->status == 'In Progress')

                                <span class="badge bg-primary">
                                    In Progress
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    Pending
                                </span>

                            @endif

                        </td>

                        <td>{{ $task->due_date }}</td>

                        <td>

                            <a href="{{ route('manager.tasks.show', $task) }}"
                               class="btn btn-info btn-sm">
                                View
                            </a>

                            <a href="{{ route('manager.tasks.edit', $task) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('manager.tasks.destroy', $task) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this task?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            No Tasks Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection