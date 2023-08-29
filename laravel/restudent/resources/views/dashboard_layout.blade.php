<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @stack('css')
    <!-- Include custom CSS for styling -->
    {{-- <link href="custom.css" rel="stylesheet"> --}}
    <style>
        ul li a{
            color: white;
            font-size: 20px;
        }
        a:hover{
            color: white;
        }
        #sidebar{
            height: 100%;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    <!-- Content -->
<div class="container-fluid mt-1">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark rounded sidebar">
            <div class="position-sticky">
                {{-- class="position-sticky" --}}
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/dashboard')}}">
                            <i class="bi bi-house-fill"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/allusers')}}">
                            <i class="bi bi-people-fill"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/allfood')}}">
                            <i class="bi bi-stack"></i> Food Items
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Main Content -->
        @yield('content')
    </div>
</div>
    <!-- Include Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>