@if (!session('admin_name'))
<script>
    window.location.href="{{url('/admin')}}";
</script>
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('css')
    <style>
        body {
            padding: 2px;
            margin-top: 2px;
        }

        .sidebar {
            height: 100%;
            position: fixed;
            left: 2px;
            margin-top: 1px;
            border-radius: 5px;
        }

        ul li a {
            color: white;
            font-size: 18px;
        }

        a:hover {
            color: white;
        }

        .content {
            margin-left: 10px;
            margin-top: 10px;
            padding: 5px;
        }

        #cafe-name {
            font-family: "Lucida Handwriting", cursive;
            font-size: 25px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top top-nav">
        <h1 class="navbar-brand fw-bold" href="#" id="cafe-name">Klassy Cafe</h1>
        {{-- @if(session('admin_name'))
        <h2 class="navbar-brand fw-bold h4" href="#">Welcome {{session('admin_name')}}</h2>
        @endif --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <a class="nav-link text-light" href="{{url('/admin_logout')}}"><button class="btn btn-sm bg-white text-dark fw-bold rounded">Log Out <i class="bi bi-power"></i></button></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-lg-2 rounded">
                <div class="sidebar  bg-dark col-lg-2 col-md-2">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{url('/dashboard')}}"><i
                                    class="bi bi-house-fill"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/allusers')}}"><i
                                    class="bi bi-people-fill"></i> Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/allfood')}}"><i class="bi bi-stack"></i>
                                Food Items</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/getbooking')}}"><i
                                    class="bi bi-cart-check-fill"></i> All Bookings</a></li>
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
    @stack('script')
    <script src="//code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        const resDiv = document.getElementById('resDiv');
                setTimeout(() => {
                    resDiv.remove();
                }, 3000);
    </script>
</body>

</html>