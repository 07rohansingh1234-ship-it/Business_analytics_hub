@extends('layouts.app')

@section('title', 'Submit Report')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Submit Report</h4>
    </div>

    <div class="card-body">

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST"
              action="{{ route('analyst.reports.store') }}"
              enctype="multipart/form-data">

            @csrf

            {{-- Task Selection --}}
            <div class="mb-3">

                <label class="form-label">Task</label>

                @if($tasks->count())

                    <select name="task_id" class="form-select" required>

                        <option value="">-- Select Task --</option>

                        @foreach($tasks as $task)

                            <option value="{{ $task->id }}"
                                {{ old('task_id') == $task->id ? 'selected' : '' }}>

                                {{ $task->title }}

                            </option>

                        @endforeach

                    </select>

                    <small class="text-muted">
                        Only completed tasks without an existing report are shown.
                    </small>

                @else

                    <div class="alert alert-warning mb-0">
                        <strong>No completed tasks available.</strong><br>
                        Complete a task assigned by your manager before submitting a report.
                    </div>

                @endif

            </div>

            {{-- Report Title --}}
            <div class="mb-3">

                <label class="form-label">Report Title</label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    placeholder="Enter report title"
                    required>

            </div>

            {{-- Summary --}}
            <div class="mb-3">

                <label class="form-label">Summary</label>

                <textarea
                    name="summary"
                    rows="5"
                    class="form-control"
                    placeholder="Write a brief summary..."
                    required>{{ old('summary') }}</textarea>

            </div>

            {{-- Recommendation --}}
            <div class="mb-3">

                <label class="form-label">Recommendation</label>

                <textarea
                    name="recommendation"
                    rows="5"
                    class="form-control"
                    placeholder="Provide your recommendations..."
                    required>{{ old('recommendation') }}</textarea>

            </div>

            {{-- Attachment --}}
            <div class="mb-3">

                <label class="form-label">Attachment (Optional)</label>

                <input
                    type="file"
                    name="attachment"
                    class="form-control"
                    accept=".pdf,.doc,.docx">

                <small class="text-muted">
                    Allowed file types: PDF, DOC, DOCX (Max: 2 MB)
                </small>

            </div>

            {{-- Buttons --}}
            <div class="d-flex justify-content-between">

                <a href="{{ route('analyst.reports.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

                @if($tasks->count())

                    <button type="submit" class="btn btn-success">
                        Submit Report
                    </button>

                @else

                    <button type="button"
                            class="btn btn-secondary"
                            disabled>

                        No Task Available

                    </button>

                @endif

            </div>

        </form>

    </div>

</div>

@endsection