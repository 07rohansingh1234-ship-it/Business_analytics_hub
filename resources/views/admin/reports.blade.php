@extends('layouts.app')

@section('title','My Reports')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>My Reports</h2>

    <a href="{{ route('analyst.reports.create') }}" class="btn btn-primary">
        + Submit Report
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow">

<div class="card-body">

@if($reports->count())

<table class="table table-bordered">

<thead class="table-dark">
<tr>
    <th>Title</th>
    <th>Task</th>
    <th>Status</th>
    <th>Created</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

@foreach($reports as $report)

<tr>

<td>{{ $report->title }}</td>

<td>{{ $report->task->title }}</td>

<td>

@if($report->status=='approved')

<span class="badge bg-success">
Approved
</span>

@elseif($report->status=='submitted')

<span class="badge bg-primary">
Submitted
</span>

@elseif($report->status=='draft')

<span class="badge bg-secondary">
Draft
</span>

@else

<span class="badge bg-danger">
Rejected
</span>

@endif

</td>

<td>{{ $report->created_at->format('d M Y') }}</td>

<td>

<a href="{{ route('analyst.reports.show',$report) }}"
class="btn btn-info btn-sm">

View

</a>

@if($report->status!='approved')

<a href="{{ route('analyst.reports.edit',$report) }}"
class="btn btn-warning btn-sm">

Edit

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

<div class="text-center">

No Reports Submitted

</div>

@endif

</div>

</div>

@endsection