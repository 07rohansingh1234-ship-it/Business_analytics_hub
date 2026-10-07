@php
use Illuminate\Support\Str;
@endphp
@extends('layouts.app')

@section('title','AI Insights')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4>🤖 AI Insights</h4>
        </div>

        <div class="card-body">

            @if($insights->count())

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Dataset</th>
                    <th>Question</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>

                </thead>

                <tbody>

                @foreach($insights as $insight)

                <tr>

                    <td>{{ $insight->id }}</td>

                    <td>{{ $insight->dataset->title ?? 'N/A' }}</td>

                    <td>{{ Str::limit($insight->question,50) }}</td>

                    <td>{{ $insight->created_at->format('d M Y') }}</td>

                    <td>

                        <a href="{{ route('manager.ai-insights.show',$insight->dataset_id) }}"
                           class="btn btn-sm btn-primary">

                            View

                        </a>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

            @else

                <div class="text-center">

                    No AI Insights Found.

                </div>

            @endif

        </div>

    </div>

</div>

@endsection