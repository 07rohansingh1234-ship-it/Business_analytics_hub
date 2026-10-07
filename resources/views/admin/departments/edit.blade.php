@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Edit Department</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.departments.update', $department) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <!-- Department Name -->
                        <div class="mb-3">

                            <label class="form-label">Department Name</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $department->name) }}"
                                placeholder="Enter Department Name">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Description -->
                        <div class="mb-4">

                            <label class="form-label">Description</label>

                            <textarea
                                name="description"
                                rows="5"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Enter Description">{{ old('description', $department->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">

                            <a href="{{ route('admin.departments.index') }}"
                               class="btn btn-secondary">
                                Back
                            </a>

                            <button type="submit" class="btn btn-warning">
                                Update Department
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection