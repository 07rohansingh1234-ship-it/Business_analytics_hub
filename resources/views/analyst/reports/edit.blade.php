@extends('layouts.app')

@section('title','Edit Report')

@section('content')

<div class="card shadow">

<div class="card-header bg-warning">

<h4>Edit Report</h4>

</div>

<div class="card-body">

<form method="POST"
action="{{ route('analyst.reports.update',$report) }}">

@csrf

@method('PUT')

<div class="mb-3">

<label>Title</label>

<input
type="text"
name="title"
value="{{ $report->title }}"
class="form-control">

</div>

<div class="mb-3">

<label>Summary</label>

<textarea
name="summary"
rows="5"
class="form-control">{{ $report->summary }}</textarea>

</div>

<div class="mb-3">

<label>Recommendation</label>

<textarea
name="recommendation"
rows="5"
class="form-control">{{ $report->recommendation }}</textarea>

</div>

<button class="btn btn-success">

Update Report

</button>

<a href="{{ route('analyst.reports.index') }}"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

@endsection