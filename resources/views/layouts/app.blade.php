<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusiLens</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="icon" type="image/png" href="{{ asset('images/d.png') }}">
      <style>
.sidebar{
    width:250px;
    min-height:100vh;
    background: linear-gradient(180deg,#0B1F3A,#103B73,#1F6FEB);
    color:white;
}
        </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<body>

<div class="d-flex">

    {{-- Sidebar --}}
<div class="sidebar text-white p-3">

    <h3>BusiLens</h3>

    <hr>

    {{-- ADMIN --}}
    @if(Auth::user()->role == 'admin')

        <a href="{{ route('admin.dashboard') }}" class="d-block text-white mb-2 text-decoration-none">
            Dashboard
        </a>

        <a href="{{ route('admin.departments.index') }}" class="d-block text-white mb-2 text-decoration-none">
            Departments
        </a>

        <a href="{{ route('admin.users.index') }}" class="d-block text-white mb-2 text-decoration-none">
            Users
        </a>

    {{-- MANAGER --}}
    @elseif(Auth::user()->role == 'manager')

        <a href="{{ route('manager.dashboard') }}" class="d-block text-white mb-2 text-decoration-none">
            Dashboard
        </a>
<a href="{{ route('manager.tasks.index') }}"
   class="d-block text-white mb-2 text-decoration-none">
    Tasks
</a>
       

       
        <a href="{{ route('manager.datasets.index') }}" class="d-block text-white mb-2 text-decoration-none">
            Datasets
        </a>

    <a href="{{ route('manager.reports.index') }}" class="nav-link">
        <i class="fas fa-file-alt me-2"></i>
        Reports
    </a>
       <a href="{{ route('manager.ai-insights.index') }}"
   class="d-block text-white mb-2 text-decoration-none">
    AI Insights
</a>
       

    {{-- ANALYST --}}
@elseif(Auth::user()->role == 'analyst')

    <a href="{{ route('analyst.dashboard') }}"
       class="d-block text-white mb-2 text-decoration-none">
        🏠 Dashboard
    </a>

    <a href="{{ route('analyst.tasks.index') }}"
       class="d-block text-white mb-2 text-decoration-none">
        📋 My Tasks
    </a>
<a href="{{ route('analyst.reports.index') }}"
   class="d-block text-white mb-2 text-decoration-none">
    📄 Reports
</a>
    

@endif

    <hr>

   <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger w-100">
        Logout
    </button>
</form>

</div>

    {{-- Main Content --}}
    <div class="flex-grow-1">

        <nav class="navbar bg-light shadow-sm px-4">

            <h4>@yield('title')</h4>

            <span>
                Welcome,
                {{ Auth::user()->name }}
            </span>

        </nav>

        <div class="container mt-4">

            @yield('content')

        </div>

    </div>

</div>

</body>
</html>