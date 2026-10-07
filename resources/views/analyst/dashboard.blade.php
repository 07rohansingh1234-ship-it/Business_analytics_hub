@extends('layouts.app')

@section('title','Analyst Dashboard')

@section('content')

<h2 class="mb-4">
    Analyst Dashboard
</h2>

<div class="row">

    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white shadow">
            <div class="card-body text-center">
                <h5>Total Tasks</h5>
                <h2>{{ $totalTasks }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-dark shadow">
            <div class="card-body text-center">
                <h5>Pending</h5>
                <h2>{{ $pendingTasks }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card bg-info text-white shadow">
            <div class="card-body text-center">
                <h5>In Progress</h5>
                <h2>{{ $inProgressTasks }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white shadow">
            <div class="card-body text-center">
                <h5>Completed</h5>
                <h2>{{ $completedTasks }}</h2>
            </div>
        </div>
    </div>

</div>

@endsection