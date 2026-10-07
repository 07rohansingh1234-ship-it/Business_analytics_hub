@extends('layouts.app')

@section('title','Dataset Analytics')

@section('content')

<h2 class="mb-4">Dataset Analytics</h2>

<div class="row">

    <div class="col-md-3 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h6>Total Revenue</h6>
                <h3>₹{{ number_format($totalRevenue,2) }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h6>Total Profit</h6>
                <h3>₹{{ number_format($totalProfit,2) }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h6>Total Orders</h6>
                <h3>{{ $orders }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h6>Average Order Value</h6>
                <h3>₹{{ number_format($average,2) }}</h3>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
                Revenue by Product
            </div>
            <div class="card-body">
                <div id="productChart"></div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
                Revenue by City
            </div>
            <div class="card-body">
                <div id="cityChart"></div>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-12">

        <div class="card shadow">

            <div class="card-header">
                Monthly Revenue
            </div>

            <div class="card-body">

                <div id="monthChart"></div>

            </div>

        </div>

    </div>

</div>

<div class="card mt-4 shadow">

    <div class="card-header bg-success text-white">
        AI Insights
    </div>

    <div class="card-body">

        <ul>
            <li>Total Revenue: <strong>₹{{ number_format($totalRevenue,2) }}</strong></li>
            <li>Total Profit: <strong>₹{{ number_format($totalProfit,2) }}</strong></li>
            <li>Total Orders: <strong>{{ $orders }}</strong></li>
            <li>Average Order Value: <strong>₹{{ number_format($average,2) }}</strong></li>
            <li>Use the product and city charts to identify your best-performing products and markets.</li>
        </ul>

    </div>

</div>

<script>

new ApexCharts(document.querySelector("#productChart"),{

    chart:{type:'bar',height:350},

    series:[{
        name:'Revenue',
        data:@json($productValues)
    }],

    xaxis:{
        categories:@json($productLabels)
    }

}).render();


new ApexCharts(document.querySelector("#cityChart"),{

    chart:{type:'pie',height:350},

    series:@json($cityValues),

    labels:@json($cityLabels)

}).render();


new ApexCharts(document.querySelector("#monthChart"),{

    chart:{type:'line',height:350},

    series:[{
        name:'Revenue',
        data:@json($monthValues)
    }],

    xaxis:{
        categories:@json($monthLabels)
    }

}).render();

</script>

@endsection