@extends('layouts.app')

@section('title', 'Add User')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New User</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.users.store') }}" method="POST">

                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder="Enter full name">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="Enter email">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="mb-3">
                            <label class="form-label">Role</label>

                            <select
                                name="role"
                                class="form-select @error('role') is-invalid @enderror">

                                <option value="">Select Role</option>

                                <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>
                                    Admin
                                </option>

                                <option value="manager" {{ old('role')=='manager' ? 'selected' : '' }}>
                                    Manager
                                </option>

                                <option value="analyst" {{ old('role')=='analyst' ? 'selected' : '' }}>
                                    Analyst
                                </option>

                            </select>

                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Department -->
                        <div class="mb-4">
                            <label class="form-label">Department</label>

                            <select
                                name="department_id"
                                class="form-select @error('department_id') is-invalid @enderror">

                                <option value="">Select Department</option>

                                @foreach($departments as $department)

                                    <option
                                        value="{{ $department->id }}"
                                        {{ old('department_id') == $department->id ? 'selected' : '' }}>

                                        {{ $department->name }}

                                    </option>

                                @endforeach

                            </select>

                            @error('department_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">

                            <a href="{{ route('admin.users.index') }}"
                               class="btn btn-secondary">
                                Back
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Create User
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection