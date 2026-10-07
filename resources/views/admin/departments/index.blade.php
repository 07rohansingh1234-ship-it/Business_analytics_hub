<!-- <h1>DEPARTMENTS </h1>
<table style="border:2px solid black">
    <tr>
        <th style="border:2px solid black">Name</th>
        <th style="border:2px solid black">Description</th>
        <th style="border:2px solid black">Actions</th>
        <th style="border:2px solid black">Delete</th>
</tr>
@foreach($departments as $d)
<tr>
    <td style="border:2px solid black">
        {{$d->name}}</td>
    <td style="border:2px solid black">{{$d->description}}</td>
    <td style="border:2px solid black">Edit</td>
    <td style="border:2px solid black">Delete</td>
</tr>
@endforeach
</table> -->
@extends('layouts.app')

@section('title','Departments')

@section('content')



<div class="container-fluid">

    {{-- Heading --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Departments</h2>

        <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">
            + Add Department
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Departments Table --}}
    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            Department List
        </div>

        <div class="card-body p-0">

            <table class="table table-hover table-bordered mb-0">

                <thead class="table-light">

                    <tr>
                        <th width="80">ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="180" class="text-center">Action</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($departments as $department)

                    <tr>

                        <td>{{ $department->id }}</td>

                        <td>{{ $department->name }}</td>

                        <td>{{ $department->description }}</td>

                        <td class="text-center">
<a href="{{ route('admin.departments.show', $department) }}"
   class="btn btn-info btn-sm text-white">
    View
</a>
                            <a href="{{ route('admin.departments.edit',$department->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('admin.departments.destroy',$department->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-4">
                            No departments found.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection