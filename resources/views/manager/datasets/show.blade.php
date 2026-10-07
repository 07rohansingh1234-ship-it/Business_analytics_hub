@extends('layouts.app')

@section('title','Dataset Preview')

@section('content')

<h2 class="mb-4">Dataset Preview</h2>

<div class="card mb-4">
    <div class="card-body">

        <h4>{{ $dataset->title }}</h4>

        <p>{{ $dataset->description }}</p>

        <p><strong>Department:</strong>
            {{ $dataset->department?->name ?? 'N/A' }}
        </p>

        <p><strong>Uploaded By:</strong>
            {{ $dataset->uploader?->name ?? 'Unknown' }}
        </p>

        <a href="{{ route('manager.datasets.download',$dataset) }}"
            class="btn btn-success">
            Download Dataset
        </a>

        <a href="{{ route('manager.datasets.index') }}"
            class="btn btn-secondary">
            Back
        </a>

    </div>
</div>
<a href="{{ route('manager.datasets.analytics',$dataset) }}"
class="btn btn-primary btn-lg">
    Analyze Dataset
</a>

<div class="card">

    <div class="card-header bg-primary text-white">
        CSV Preview (First 50 Rows)
    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    @foreach($headers as $header)

                        <th>{{ $header }}</th>

                    @endforeach

                </tr>

            </thead>

            <tbody>

                @forelse($rows as $row)

                    <tr>

                        @foreach($row as $cell)

                            <td>{{ $cell }}</td>

                        @endforeach

                    </tr>

                @empty

                    <tr>

                        <td colspan="{{ count($headers) }}">
                            No Data Found
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<br>



@endsection