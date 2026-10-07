@extends('layouts.app')

@section('title','Edit Dataset')

@section('content')

<h2>Edit Dataset</h2>

<form action="{{ route('manager.datasets.update',$dataset) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-3">

<label>Title</label>

<input type="text"
       name="title"
       value="{{ $dataset->title }}"
       class="form-control">

</div>

<div class="mb-3">

<label>Description</label>

<textarea name="description"
class="form-control">{{ $dataset->description }}</textarea>

</div>

<div class="mb-3">

<label>Department</label>

<select name="department_id"
class="form-control">

@foreach($departments as $department)

<option value="{{ $department->id }}"
@if($dataset->department_id==$department->id)
selected
@endif>

{{ $department->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Replace File</label>

<input type="file"
name="file"
class="form-control">

</div>

<button class="btn btn-primary">

Update

</button>

<a href="{{ route('manager.datasets.index') }}"
class="btn btn-secondary">

Cancel

</a>

</form>

@endsection