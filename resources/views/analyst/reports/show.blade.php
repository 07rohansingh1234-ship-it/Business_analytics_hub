@extends('layouts.app')

@section('title','Report Details')

@section('content')

<div class="card shadow">

<div class="card-header bg-dark text-white">

<h3>{{ $report->title }}</h3>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th>Task</th>

<td>{{ $report->task->title }}</td>

</tr>

<tr>

<th>Summary</th>

<td>{{ $report->summary }}</td>

</tr>

<tr>

<th>Recommendation</th>

<td>{{ $report->recommendation }}</td>

</tr>

<tr>

<th>Status</th>

<td>{{ $report->status }}</td>

</tr>

@if($report->attachment)

<tr>

<th>Attachment</th>

<td>

<a href="{{ asset('storage/'.$report->attachment) }}"
target="_blank">

Download Attachment

</a>

</td>

</tr>

@endif

</table>

</div>

</div>

@endsection