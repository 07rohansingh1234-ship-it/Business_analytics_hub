@extends('layouts.app')

@section('title','Datasets')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Datasets</h2>

    <a href="{{ route('manager.datasets.create') }}" class="btn btn-primary">
        Upload Dataset
    </a>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<table class="table table-bordered table-striped">

    <thead class="table-dark">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Department</th>
        <th>Uploaded By</th>
        <th>File</th>
        <th>Actions</th>
    </tr>

    </thead>

    <tbody>

    @forelse($datasets as $dataset)

    <tr>

        <td>{{ $dataset->id }}</td>

        <td>{{ $dataset->title }}</td>

       <td>{{ $dataset->department?->name ?? 'No Department Assigned' }}</td>
        <td>{{ $dataset->uploader->name }}</td>

        <td>{{ $dataset->file_name }}</td>

        <td>

            <a href="{{ route('manager.datasets.show',$dataset) }}"
                class="btn btn-info btn-sm">
                View
            </a>

            <a href="{{ route('manager.datasets.edit',$dataset) }}"
                class="btn btn-warning btn-sm">
                Edit
            </a>

            <a href="{{ route('manager.datasets.download',$dataset) }}"
                class="btn btn-success btn-sm">
                Download
            </a>
            <form action="{{ route('manager.ai-insights.generate', $dataset) }}"
      method="POST"
      class="d-inline">
    @csrf

    <button class="btn btn-success btn-sm">
        🤖 Generate AI Insights
    </button>
</form>

            <form action="{{ route('manager.datasets.destroy',$dataset) }}"
                method="POST"
                class="d-inline">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Delete Dataset?')">

                    Delete

                </button>

            </form>

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="6" class="text-center">
            No Datasets Found
        </td>

    </tr>

    @endforelse

    </tbody>

</table>

@endsection