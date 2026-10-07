@extends('layouts.app')

@section('title','Edit User')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning">
                    <h4 class="mb-0">Edit User</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.users.update',$user) }}" method="POST">

                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div class="mb-3">

                            <label class="form-label">Name</label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name',$user->name) }}"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>


                        {{-- Email --}}
                        <div class="mb-3">

                            <label class="form-label">Email</label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email',$user->email) }}"
                                class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>


                       {{-- New Password --}}
<div class="mb-3">

    <label class="form-label">New Password</label>

    <div class="input-group">
        <input
            type="password"
            name="password"
            id="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Leave blank to keep current password">

        <button
            type="button"
            class="btn btn-outline-secondary"
            onclick="togglePassword('password', this)"
            title="Show/Hide Password">
            👁
        </button>
    </div>

    <small class="text-muted">
        Leave blank if you do not want to change the password.
    </small>

    @error('password')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror

</div>


{{-- Confirm Password --}}
<div class="mb-3">

    <label class="form-label">Confirm New Password</label>

    <div class="input-group">
        <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            class="form-control"
            placeholder="Re-enter new password">

        <button
            type="button"
            class="btn btn-outline-secondary"
            onclick="togglePassword('password_confirmation', this)"
            title="Show/Hide Password">
            👁
        </button>
    </div>

</div>

                        {{-- Role --}}
                        <div class="mb-3">

                            <label class="form-label">Role</label>

                            <select
                                name="role"
                                class="form-select @error('role') is-invalid @enderror">

                                <option value="admin"
                                    {{ old('role',$user->role)=='admin' ? 'selected' : '' }}>
                                    Admin
                                </option>

                                <option value="manager"
                                    {{ old('role',$user->role)=='manager' ? 'selected' : '' }}>
                                    Manager
                                </option>

                                <option value="analyst"
                                    {{ old('role',$user->role)=='analyst' ? 'selected' : '' }}>
                                    Analyst
                                </option>

                            </select>

                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>


                        {{-- Department --}}
                        <div class="mb-4">

                            <label class="form-label">Department</label>

                            <select
                                name="department_id"
                                class="form-select @error('department_id') is-invalid @enderror">

                                @foreach($departments as $department)

                                    <option
                                        value="{{ $department->id }}"
                                        {{ old('department_id',$user->department_id)==$department->id ? 'selected' : '' }}>

                                        {{ $department->name }}

                                    </option>

                                @endforeach

                            </select>

                            @error('department_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>


                        {{-- Buttons --}}
                        <div class="d-flex justify-content-between">

                            <a
                                href="{{ route('admin.users.index') }}"
                                class="btn btn-secondary">

                                Back

                            </a>

                            <button type="submit" class="btn btn-warning">

                                Update User

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);

        if (input.type === 'password') {
            input.type = 'text';
            button.innerHTML = '🙈';
        } else {
            input.type = 'password';
            button.innerHTML = '👁';
        }
    }
</script>