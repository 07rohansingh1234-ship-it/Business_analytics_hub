<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Business Insight Hub') }}</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#2563eb,#1e40af,#0f172a);
        }

        .container{
            width:100%;
            max-width:420px;
            padding:20px;
        }

        .logo{
            text-align:center;
            color:white;
            margin-bottom:25px;
        }

        .logo h1{
            font-size:32px;
            font-weight:700;
        }

        .logo p{
            margin-top:8px;
            opacity:.85;
        }

        .card{
            background:white;
            border-radius:18px;
            padding:35px;
            box-shadow:0 20px 45px rgba(0,0,0,.25);
        }

        .footer{
            text-align:center;
            color:white;
            margin-top:20px;
            opacity:.8;
            font-size:14px;
        }

        input{
            width:100%;
            padding:12px 15px;
            border:1px solid #d1d5db;
            border-radius:10px;
            margin-top:8px;
            margin-bottom:18px;
            font-size:15px;
        }

        input:focus{
            outline:none;
            border-color:#2563eb;
            box-shadow:0 0 0 3px rgba(37,99,235,.2);
        }

        button{
            width:100%;
            background:#2563eb;
            color:white;
            padding:13px;
            border:none;
            border-radius:10px;
            font-size:16px;
            font-weight:600;
            cursor:pointer;
            transition:.3s;
        }

        button:hover{
            background:#1d4ed8;
        }

        a{
            color:#2563eb;
            text-decoration:none;
        }

        a:hover{
            text-decoration:underline;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="container">

    <div class="logo">
        <h1>📊 Business Insight Hub</h1>
        <p>Analyze. Visualize. Decide.</p>
    </div>

    <div class="card">
        {{ $slot }}
    </div>

    <div class="footer">
        © {{ date('Y') }} Business Insight Hub
    </div>

</div>

</body>
</html>