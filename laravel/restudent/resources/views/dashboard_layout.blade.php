<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @stack('css')
    <style>
        body{
            padding: 2px;
            margin-top: 2px;
        }
        .sidebar{
            height: 100%;
            position: fixed;
            left: 2px;
            margin-top: 1px;
            border-radius: 5px;
        }
        ul li a{
            color: white;
            font-size: 20px;
        }
        a:hover{
            color: white;
        }
        .content{
            margin-left: 10px;
            margin-top: 10px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top top-nav">
        <h2 class="navbar-brand fw-bold" href="#">ADMIN PANEL</h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <a class="nav-link text-light" href="#">Log Out <i class="bi bi-power"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-lg-2 rounded">
                <div class="sidebar  bg-dark col-lg-2 col-md-2">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{url('/dashboard')}}"><i class="bi bi-house-fill"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/allusers')}}"><i class="bi bi-people-fill"></i> Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/allfood')}}"><i class="bi bi-stack"></i> Food Items</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>