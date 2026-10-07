@extends('layouts.app')

@section('title','Upload Dataset')

@section('content')

<h2>Upload Dataset</h2>

<form action="{{ route('manager.datasets.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<div class="mb-3">

<label>Title</label>

<input type="text"
       name="title"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Description</label>

<textarea name="description"
          class="form-control"></textarea>

</div>

<div class="mb-3">

<label>Department</label>

<select name="department_id"
        class="form-control">

@foreach($departments as $department)

<option value="{{ $department->id }}">
    {{ $department->name }}
</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Dataset File</label>

<input type="file"
       name="file"
       class="form-control"
       required>

</div>

<button class="btn btn-primary">
    Upload
</button>

<a href="{{ route('manager.datasets.index') }}"
class="btn btn-secondary">
Cancel
</a>

</form>

@endsection