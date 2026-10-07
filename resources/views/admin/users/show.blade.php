@extends('layouts.app')

@section('title','User Details')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-info text-white">

                    <h4 class="mb-0">
                        User Details
                    </h4>

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="220">ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>

                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td>{{ ucfirst($user->role) }}</td>
                        </tr>

                        <tr>
                            <th>Department</th>
                            <td>{{ $user->department->name ?? 'Not Assigned' }}</td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{ $user->created_at->format('d M Y h:i A') }}</td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td>{{ $user->updated_at->format('d M Y h:i A') }}</td>
                        </tr>

                    </table>

                    <div class="mt-3">

                        <a href="{{ route('admin.users.edit',$user) }}"
                           class="btn btn-warning">
                            Edit
                        </a>

                        <a href="{{ route('admin.users.index') }}"
                           class="btn btn-secondary">
                            Back
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection