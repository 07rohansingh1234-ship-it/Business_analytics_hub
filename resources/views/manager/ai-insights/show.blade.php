@extends('layouts.app')

@section('title','AI Insight Details')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h4>

                Dataset :
                {{ $dataset->title }}

            </h4>

        </div>

        <div class="card-body">

            @forelse($insights as $insight)

            <div class="card mb-3">

                <div class="card-header bg-light">

                    <strong>

                        Question

                    </strong>

                </div>

                <div class="card-body">

                    {{ $insight->question }}

                </div>

            </div>

            <div class="card mb-4 border-success">

                <div class="card-header bg-success text-white">

                    <strong>

                        AI Answer

                    </strong>

                </div>

                <div class="card-body">

                    {{ $insight->answer }}

                </div>

            </div>

            @empty

            <div class="alert alert-warning">

                No AI Insights available for this dataset.

            </div>

            @endforelse

            <a href="{{ route('manager.ai-insights.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>

</div>

@endsection