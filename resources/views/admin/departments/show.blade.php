@extends('layouts.app')

@section('title', 'Department Details')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Department Details</h4>

                    <a href="{{ route('admin.departments.index') }}" class="btn btn-light btn-sm">
                        Back
                    </a>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="200">ID</th>
                            <td>{{ $department->id }}</td>
                        </tr>

                        <tr>
                            <th>Department Name</th>
                            <td>{{ $department->name }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td>{{ $department->description ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{ $department->created_at->format('d M Y, h:i A') }}</td>
                        </tr>

                        <tr>
                            <th>Last Updated</th>
                            <td>{{ $department->updated_at->format('d M Y, h:i A') }}</td>
                        </tr>

                    </table>

                    <div class="mt-3">

                        <a href="{{ route('admin.departments.edit', $department) }}"
                           class="btn btn-warning">
                            Edit
                        </a>

                        <a href="{{ route('admin.departments.index') }}"
                           class="btn btn-secondary">
                            Back to List
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection