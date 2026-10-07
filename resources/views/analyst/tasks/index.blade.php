@extends('layouts.app')

@section('title','My Tasks')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>My Assigned Tasks</h2>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow">

    <div class="card-body">

        @if($tasks->count())

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>Title</th>
                    <th>Dataset</th>
                    <th>Assigned By</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($tasks as $task)

                <tr>

                    <td>{{ $task->title }}</td>

                    <td>{{ $task->dataset->title }}</td>

                    <td>{{ $task->manager->name }}</td>

                    <td>

                        @if($task->priority=="high")

                            <span class="badge bg-danger">High</span>

                        @elseif($task->priority=="medium")

                            <span class="badge bg-warning text-dark">Medium</span>

                        @else

                            <span class="badge bg-success">Low</span>

                        @endif

                    </td>

                    <td>

                        @if($task->status=="completed")

                            <span class="badge bg-success">Completed</span>

                        @elseif($task->status=="in_progress")

                            <span class="badge bg-primary">In Progress</span>

                        @else

                            <span class="badge bg-secondary">Pending</span>

                        @endif

                    </td>

                    <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>

                    <td>

                        <a href="{{ route('analyst.tasks.show',$task) }}"
                           class="btn btn-info btn-sm">

                            View

                        </a>

                        <a href="{{ route('analyst.tasks.edit',$task) }}"
                           class="btn btn-warning btn-sm">

                            Update

                        </a>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        @else

            <div class="text-center">

                No Tasks Assigned

            </div>

        @endif

    </div>

</div>

@endsection