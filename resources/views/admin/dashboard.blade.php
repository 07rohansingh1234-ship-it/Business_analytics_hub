@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Admin Dashboard</h2>
            <p class="text-muted">Welcome back, {{ Auth::user()->name }}</p>
        </div>
    </div>

    {{-- Dashboard Cards --}}
    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Departments</h6>
                    <h2>{{ $departmentCount ?? 0 }}</h2>
                    <small>Total Departments</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Users</h6>
                    <h2>{{ $userCount ?? 0 }}</h2>
                    <small>Total Users</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Datasets</h6>
                    <h2>{{ $datasetCount ?? 0 }}</h2>
                    <small>Total Datasets</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Reports</h6>
                    <h2>{{ $reportCount ?? 0 }}</h2>
                    <small>Total Reports</small>
                </div>
            </div>
        </div>

    </div>

    {{-- Quick Actions --}}
    <div class="card shadow-sm mb-4">

        <div class="card-header">
            <strong>Quick Actions</strong>
        </div>

        <div class="card-body">

            <a href="{{ route('admin.departments.create') }}"
               class="btn btn-primary me-2">
                Add Department
            </a>

            <a href="{{route('admin.users.create')}}" class="btn btn-success me-2">
                Add User
            </a>

            

        </div>

    </div>

    {{-- Recent Departments --}}
    <div class="card shadow-sm">

        <div class="card-header">
            <strong>Recent Departments</strong>
        </div>

        <div class="card-body p-0">

            <table class="table table-striped mb-0">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Description</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($departments ?? [] as $department)

                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->description }}</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="3" class="text-center">
                            No Departments Found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection