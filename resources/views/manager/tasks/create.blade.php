@extends('layouts.app')

@section('title', 'Assign Task')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4>Assign New Task</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('manager.tasks.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Task Title</label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}">

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="form-label">Description</label>

                    <textarea name="description"
                              rows="4"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="form-label">Dataset</label>

                    <select name="dataset_id"
                            class="form-select @error('dataset_id') is-invalid @enderror">

                        <option value="">Select Dataset</option>

                        @foreach($datasets as $dataset)

                            <option value="{{ $dataset->id }}"
                                {{ old('dataset_id') == $dataset->id ? 'selected' : '' }}>

                                {{ $dataset->title }}

                            </option>

                        @endforeach

                    </select>

                    @error('dataset_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>


                <div class="mb-3">

                    <label class="form-label">Assign To</label>

                    <select name="assigned_to"
                            class="form-select @error('assigned_to') is-invalid @enderror">

                        <option value="">Select Analyst</option>

                        @foreach($analysts as $analyst)

                            <option value="{{ $analyst->id }}"
                                {{ old('assigned_to') == $analyst->id ? 'selected' : '' }}>

                                {{ $analyst->name }}

                            </option>

                        @endforeach

                    </select>

                    @error('assigned_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>


                <div class="mb-3">

                    <label class="form-label">Priority</label>

                    <select name="priority"
                            class="form-select @error('priority') is-invalid @enderror">

                        <option value="">Select Priority</option>

                        <option value="low">Low</option>

                        <option value="medium">Medium</option>

                        <option value="high">High</option>

                    </select>

                    @error('priority')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>


                <div class="mb-3">

                    <label class="form-label">Due Date</label>

                    <input type="date"
                           name="due_date"
                           class="form-control @error('due_date') is-invalid @enderror"
                           value="{{ old('due_date') }}">

                    @error('due_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>


                <button class="btn btn-primary">
                    Assign Task
                </button>

                <a href="{{ route('manager.tasks.index') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection