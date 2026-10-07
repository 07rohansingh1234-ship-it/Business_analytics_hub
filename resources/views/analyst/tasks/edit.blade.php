@extends('layouts.app')

@section('title','Update Task')

@section('content')

<div class="card shadow">

    <div class="card-header bg-warning">

        <h4>Update Task</h4>

    </div>

    <div class="card-body">

        <form method="POST"
              action="{{ route('analyst.tasks.update',$task) }}">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Status</label>

                <select name="status" class="form-select">

                    <option value="Pending"
                        {{ $task->status=='Pending'?'selected':'' }}>

                        Pending

                    </option>

                    <option value="In Progress"
                        {{ $task->status=='In Progress'?'selected':'' }}>

                        In Progress

                    </option>

                    <option value="Completed"
                        {{ $task->status=='Completed'?'selected':'' }}>

                        Completed

                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label>Remarks</label>

                <textarea
                    name="remarks"
                    rows="5"
                    class="form-control">{{ old('remarks',$task->remarks) }}</textarea>

            </div>

            <button class="btn btn-success">

                Save Changes

            </button>

            <a href="{{ route('analyst.tasks.index') }}"
               class="btn btn-secondary">

                Cancel

            </a>

        </form>

    </div>

</div>

@endsection