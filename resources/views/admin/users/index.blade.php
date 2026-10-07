@extends('layouts.app')

@section('title', 'Users')

@section('content')

<div class="container-fluid">

    <!-- Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Users</h2>

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            + Add User
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Users Table -->
    <div class="card shadow">

        <div class="card-header bg-dark text-white">
            User List
        </div>

        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">

                <thead class="table-light">

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Created At</th>
                        <th width="220">Actions</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>{{ $user->id }}</td>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>

                        <td>
                            <span class="badge
                                @if($user->role == 'admin')
                                    bg-danger
                                @elseif($user->role == 'manager')
                                    bg-primary
                                @else
                                    bg-success
                                @endif">

                                {{ ucfirst($user->role) }}

                            </span>
                        </td>

                        <td>
                            {{ $user->department->name ?? 'Not Assigned' }}
                        </td>

                        <td>
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        <td>

                            <a href="{{ route('admin.users.show', $user) }}"
                               class="btn btn-info btn-sm text-white">
                                View
                            </a>

                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.users.destroy', $user) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this user?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-4">

                            No users found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection