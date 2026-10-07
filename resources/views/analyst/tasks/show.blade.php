@extends('layouts.app')

@section('title','Task Details')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <h4>{{ $task->title }}</h4>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th>Title</th>
                <td>{{ $task->title }}</td>
            </tr>

            <tr>
                <th>Description</th>
                <td>{{ $task->description }}</td>
            </tr>

            <tr>
                <th>Dataset</th>
                <td>{{ $task->dataset->title }}</td>
            </tr>

            <tr>
                <th>Assigned By</th>
                <td>{{ $task->manager->name }}</td>
            </tr>

            <tr>
                <th>Priority</th>
                <td>{{ $task->priority }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ $task->status }}</td>
            </tr>

            <tr>
                <th>Due Date</th>
                <td>{{ $task->due_date }}</td>
            </tr>

            <tr>
                <th>Remarks</th>
                <td>{{ $task->remarks ?? 'No Remarks' }}</td>
            </tr>

        </table>

        <a href="{{ route('analyst.tasks.edit',$task) }}"
           class="btn btn-warning">

            Update Task

        </a>

    </div>

</div>

@endsection