<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusiLens</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="icon" type="image/png" href="{{ asset('images/d.png') }}">
    <style>
        body{
    background:#f5f7fb;
    font-family:'Segoe UI',sans-serif;
}

/* NAVBAR */
.features-section{
    background:#f8fbff;
}

.feature-card{
    background:#fff;
    padding:35px 25px;
    border-radius:18px;
    text-align:center;
    height:100%;
    transition:.3s ease;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.feature-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(37,99,235,.18);
}

.feature-icon{
    width:70px;
    height:70px;
    margin:0 auto 20px;
    border-radius:50%;
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    color:#fff;
}

.feature-card h4{
    font-weight:700;
    margin-bottom:15px;
    color:#1e293b;
}

.feature-card p{
    color:#64748b;
    line-height:1.7;
    margin-bottom:0;
}
.custom-navbar{

    background:rgba(20,30,48,.75);

    backdrop-filter:blur(14px);

    padding:15px 0;

    transition:.3s;

    box-shadow:0 5px 25px rgba(0,0,0,.08);
}

.logo-icon{

    font-size:28px;
}

.logo-text{

    letter-spacing:.5px;
}

.nav-link{

    color:white !important;

    margin:0 12px;

    font-weight:500;

    transition:.3s;
}

.nav-link:hover{

    color:#8ec5ff !important;
}

.btn-primary{

    background:linear-gradient(135deg,#2563eb,#4f46e5);

    border:none;
}

.btn-primary:hover{

    transform:translateY(-2px);

    box-shadow:0 10px 20px rgba(37,99,235,.25);
}

.btn-light{

    font-weight:600;
}
/* HERO */

.hero-section{

    position:relative;

    overflow:hidden;

    background:
    linear-gradient(135deg,#0f172a,#1e3a8a,#2563eb);

    color:white;

    padding-top:90px;
}

/* Background Glow */

.hero-section::before{

    content:"";

    width:450px;

    height:450px;

    background:#60a5fa;

    filter:blur(150px);

    position:absolute;

    top:-120px;

    right:-120px;

    opacity:.25;
}

.hero-badge{

    display:inline-block;

    background:rgba(255,255,255,.12);

    padding:10px 18px;

    border-radius:30px;

    border:1px solid rgba(255,255,255,.2);

    font-size:15px;
}

.hero-title{

    font-size:60px;

    font-weight:800;

    line-height:1.15;
}

.gradient-text{

    background:linear-gradient(90deg,#38bdf8,#ffffff);

    -webkit-background-clip:text;

    -webkit-text-fill-color:transparent;
}

.hero-description{

    font-size:20px;

    opacity:.85;

    line-height:1.8;
}

.hero-btn-primary{

    background:white;

    color:#2563eb;

    padding:14px 30px;

    border-radius:40px;

    font-weight:700;
}

.hero-btn-primary:hover{

    transform:translateY(-4px);

    color:#2563eb;
}

.hero-btn-secondary{

    border:2px solid white;

    color:white;

    padding:14px 30px;

    border-radius:40px;
}

.hero-btn-secondary:hover{

    background:white;

    color:#2563eb;
}

/* Dashboard */

.dashboard-card{

    background:white;

    border-radius:25px;

    padding:30px;

    box-shadow:0 30px 60px rgba(0,0,0,.25);

    animation:float 5s ease-in-out infinite;
}

.dashboard-header{

    font-size:20px;

    font-weight:700;

    margin-bottom:25px;

    color:#111827;
}

.dashboard-body{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:18px;
}

.metric-card{

    background:#f8fafc;

    border-radius:16px;

    padding:20px;

    transition:.3s;
}

.metric-card:hover{

    transform:translateY(-6px);

    background:#eff6ff;
}

.metric-card h6{

    color:#64748b;
}

.metric-card h2{

    color:#1e3a8a;

    font-weight:800;
}

@keyframes float{

    0%{

        transform:translateY(0px);

    }

    50%{

        transform:translateY(-12px);

    }

    100%{

        transform:translateY(0px);

    }

}
/* =======================
        Statistics
========================== */

.stats-section{

    margin-top:-70px;

    position:relative;

    z-index:10;

    padding-bottom:80px;

}

.stat-box{

    background:white;

    padding:35px 25px;

    border-radius:22px;

    box-shadow:0 20px 45px rgba(0,0,0,.08);

    transition:.35s;

    height:100%;
}

.stat-box:hover{

    transform:translateY(-12px);

    box-shadow:0 30px 60px rgba(37,99,235,.15);

}

.stat-icon{

    width:70px;

    height:70px;

    margin:auto;

    border-radius:50%;

    display:flex;

    align-items:center;

    justify-content:center;

    background:linear-gradient(135deg,#2563eb,#4f46e5);

    color:white;

    font-size:30px;

    margin-bottom:20px;

}

.stat-box h2{

    font-size:40px;

    font-weight:700;

    color:#1e3a8a;

}

.stat-box p{

    color:#64748b;

    font-size:16px;

    margin:0;

}
/* WORKFLOW */

.workflow-section{

    background:#f8fbff;

    padding:100px 0;

}

.step-card{

    background:white;

    border-radius:24px;

    padding:40px;

    text-align:center;

    position:relative;

    height:100%;

    transition:.35s;

    box-shadow:0 15px 35px rgba(0,0,0,.06);

}

.step-card:hover{

    transform:translateY(-12px);

    box-shadow:0 25px 60px rgba(37,99,235,.12);

}

.step-number{

    position:absolute;

    top:20px;

    right:25px;

    font-size:42px;

    font-weight:800;

    color:#dbeafe;

}

.step-icon{

    width:90px;

    height:90px;

    border-radius:50%;

    margin:auto;

    margin-bottom:25px;

    display:flex;

    justify-content:center;

    align-items:center;

    background:linear-gradient(135deg,#2563eb,#4f46e5);

    color:white;

    font-size:38px;

}

.step-card h4{

    font-weight:700;

    margin-bottom:18px;

}

.step-card p{

    color:#64748b;

    line-height:1.8;

}
/* =======================
        FOOTER
======================= */

.footer{

    background:#0f172a;

    color:#fff;

    padding:80px 0 30px;

}

.footer-logo{

    font-size:34px;

    font-weight:800;

    margin-bottom:20px;

}

.footer-text{

    color:#cbd5e1;

    line-height:1.9;

}

.footer h5{

    margin-bottom:20px;

    font-weight:700;

}

.footer-links{

    list-style:none;

    padding:0;

    margin:0;

}

.footer-links li{

    margin-bottom:14px;

    color:#cbd5e1;

}

.footer-links a{

    color:#cbd5e1;

    text-decoration:none;

    transition:.3s;

}

.footer-links a:hover{

    color:#60a5fa;

    padding-left:6px;

}

.footer-divider{

    margin:50px 0 25px;

    border-color:rgba(255,255,255,.1);

}

.copyright{

    color:#94a3b8;

    margin:0;

}
.logo-circle{
    width:48px;
    height:48px;
    border-radius:50%;
    background:linear-gradient(135deg,#2563eb,#4f46e5);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:20px;
    box-shadow:0 10px 25px rgba(37,99,235,.25);
}

.logo-text{
    font-size:28px;
    font-weight:800;
    color:#fff;
    line-height:1;
    letter-spacing:.5px;
}

.logo-tagline{
    display:block;
    color:rgba(255,255,255,.75);
    font-size:11px;
    letter-spacing:1px;
    text-transform:uppercase;
    margin-top:4px;
}
        </style>
</head>

<body class="bg-light">

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
    <div class="container">

        <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center" href="/">
    <img src="{{ asset('images/lpp.png') }}"
         alt="BusiLens Logo"
         width="45"
         height="45"
         class="me-2">

  

    <div>

        <div class="logo-text">
            BusiLens
        </div>

        <small class="logo-tagline">
            Analyze. Visualize. Decide.
        </small>

    </div>

</a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>

            </ul>

            <div class="d-flex align-items-center">

                @guest

                    <a href="{{ route('login') }}" class="btn btn-light px-4 rounded-pill fw-semibold">
                        Login
                    </a>

                @else

                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                           class="btn btn-primary rounded-pill px-4 me-2">
                            ADMIN Dashboard
                        </a>

                    @elseif(Auth::user()->role == 'manager')

                        <a href="{{ route('manager.dashboard') }}"
                           class="btn btn-primary rounded-pill px-4 me-2">
                            MANAGER Dashboard
                        </a>

                    @elseif(Auth::user()->role == 'analyst')

                        <a href="{{ route('analyst.dashboard') }}"
                           class="btn btn-primary rounded-pill px-4 me-2">
                           ANALYST Dashboard
                        </a>

                    @endif

                    <form action="{{ route('logout') }}"
                          method="POST"
                          class="d-inline">
                        @csrf

                        <button class="btn btn-outline-light rounded-pill px-4">
                            Logout
                        </button>

                    </form>

                @endguest

            </div>

        </div>

    </div>
</nav>

<!-- Hero -->
<!-- Hero Section -->
<section class="hero-section">

    <div class="container">

        <div class="row align-items-center min-vh-100">

            <!-- Left Side -->
            <div class="col-lg-6">

                <span class="hero-badge">
                    🚀 AI Powered Business Intelligence
                </span>

                <h1 class="hero-title mt-4">
                    Transform Your
                    <span class="gradient-text">
                        Business Data
                    </span>
                    Into Smart Decisions.
                </h1>

                <p class="hero-description mt-4">

                    BusiLens helps organizations manage datasets,
                    assign tasks, generate reports and uncover
                    AI-powered insights—all from one centralized platform.

                </p>

                @guest

                    <a href="{{ route('login') }}"
                       class="btn hero-btn-primary mt-3">

                        Get Started

                    </a>

                @else

                    @if(Auth::user()->role == 'admin')

                        <a href="{{ route('admin.dashboard') }}"
                           class="btn hero-btn-primary mt-3">

                            Go to Dashboard

                        </a>

                    @elseif(Auth::user()->role == 'manager')

                        <a href="{{ route('manager.dashboard') }}"
                           class="btn hero-btn-primary mt-3">

                            Go to Dashboard

                        </a>

                    @elseif(Auth::user()->role == 'analyst')

                        <a href="{{ route('analyst.dashboard') }}"
                           class="btn hero-btn-primary mt-3">

                            Go to Dashboard

                        </a>

                    @endif

                @endguest

                <a href="#features"
                   class="btn hero-btn-secondary mt-3 ms-3">

                    Explore Features

                </a>

            </div>


            <!-- Right Side -->

            <div class="col-lg-6">

                <div class="dashboard-card">

                    <div class="dashboard-header">

                        <span>📈 Analytics Dashboard</span>

                    </div>

                    <div class="dashboard-body">

                        <div class="metric-card">

                            <h6>Total Reports</h6>

                            <h2>245</h2>

                            <small class="text-success">
                                ↑ 18% this month
                            </small>

                        </div>

                        <div class="metric-card">

                            <h6>Datasets</h6>

                            <h2>89</h2>

                            <small class="text-primary">
                                Active Uploads
                            </small>

                        </div>

                        <div class="metric-card">

                            <h6>AI Insights</h6>

                            <h2>1,240</h2>

                            <small class="text-warning">
                                Generated
                            </small>

                        </div>

                        <div class="metric-card">

                            <h6>Tasks</h6>

                            <h2>42</h2>

                            <small class="text-danger">

                                Pending Review

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Statistics -->
<section class="stats-section">

    <div class="container">

        <div class="row text-center g-4">

            <div class="col-md-3">

                <div class="stat-box">

                    <div class="stat-icon">👥</div>

                    <h2>500+</h2>

                    <p>Users Managed</p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="stat-box">

                    <div class="stat-icon">📂</div>

                    <h2>120+</h2>

                    <p>Datasets Uploaded</p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="stat-box">

                    <div class="stat-icon">📊</div>

                    <h2>300+</h2>

                    <p>Reports Generated</p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="stat-box">

                    <div class="stat-icon">🤖</div>

                    <h2>1.2K+</h2>

                    <p>AI Insights</p>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- How It Works -->
<section class="workflow-section py-5" id="about">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                HOW IT WORKS
            </span>

            <h2 class="section-title mt-3">

                Simple Workflow.
                <br>
                Powerful Results.

            </h2>

            <p class="section-subtitle">

                BusiLens transforms raw business data into
                actionable insights in just a few steps.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="step-card">

                    <div class="step-number">
                        01
                    </div>

                    <div class="step-icon">
                        📂
                    </div>

                    <h4>Upload Data</h4>

                    <p>

                        Upload CSV or Excel datasets from
                        different departments into one secure
                        workspace.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="step-card">

                    <div class="step-number">
                        02
                    </div>

                    <div class="step-icon">
                        📊
                    </div>

                    <h4>Analyze & Manage</h4>

                    <p>

                        Assign analysts, manage reports,
                        monitor KPIs and collaborate
                        across teams.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="step-card">

                    <div class="step-number">
                        03
                    </div>

                    <div class="step-icon">
                        🤖
                    </div>

                    <h4>AI Insights</h4>

                    <p>

                        Receive AI-powered recommendations,
                        trends and business insights
                        instantly.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- Features Section -->
<section class="features-section py-5" id="features">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                FEATURES
            </span>

            <h2 class="section-title mt-3">

                Everything You Need
                <br>
                To Make Smarter Decisions

            </h2>

            <p class="section-subtitle">

                Powerful tools designed to help businesses analyze data,
                collaborate efficiently, and drive better outcomes.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        📈
                    </div>

                    <h4>Interactive Dashboards</h4>

                    <p>

                        Monitor KPIs, visualize trends, and gain
                        real-time insights through beautiful
                        business dashboards.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        📂
                    </div>

                    <h4>Dataset Management</h4>

                    <p>

                        Upload, organize, and securely manage
                        CSV and Excel datasets from multiple
                        departments.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        🤖
                    </div>

                    <h4>AI Insights</h4>

                    <p>

                        Get intelligent recommendations,
                        trend analysis, and predictive
                        business insights powered by AI.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        📊
                    </div>

                    <h4>Report Generation</h4>

                    <p>

                        Generate professional reports with
                        charts, summaries, and actionable
                        analytics in seconds.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        👥
                    </div>

                    <h4>Team Collaboration</h4>

                    <p>

                        Assign analysts, track progress,
                        and collaborate efficiently
                        across your organization.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        🔒
                    </div>

                    <h4>Secure Access</h4>

                    <p>

                        Role-based authentication keeps
                        your business data protected while
                        ensuring the right level of access.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- Footer -->

<!-- Footer -->
<footer class="footer">

    <div class="container">

        <div class="row gy-5">

            <!-- Brand -->
            <div class="col-lg-4">

                <h3 class="footer-logo">

                    📊 BusiLens

                </h3>

                <p class="footer-text">

                    An AI-powered business intelligence platform that helps
                    organizations manage departments, datasets, reports,
                    and business insights from one centralized workspace.

                </p>

            </div>

            <!-- Quick Links -->

            <div class="col-lg-2">

                <h5>Quick Links</h5>

                <ul class="footer-links">

                    <li><a href="#">Home</a></li>

                    <li><a href="#features">Features</a></li>

                    <li><a href="#about">How It Works</a></li>

                </ul>

            </div>

            <!-- Platform -->

            <div class="col-lg-3">

                <h5>Platform</h5>

                <ul class="footer-links">

                    <li>📂 Dataset Management</li>

                    <li>📋 Task Management</li>

                    <li>📊 Reports</li>

                    <li>🤖 AI Insights</li>

                </ul>

            </div>

            <!-- Contact -->

            

        </div>

        <hr class="footer-divider">

        <div class="d-md-flex justify-content-between align-items-center">

            <p class="copyright">

                © {{ date('Y') }} BusiLens. All Rights Reserved.

            </p>

            

        </div>

    </div>

</footer>

</body>
</html>