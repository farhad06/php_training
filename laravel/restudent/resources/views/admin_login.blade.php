<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #logInForm {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        @if(session('message'))
        <div style="float: right;">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong style="color: black">{{session('message')}}</strong>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6" id="logInForm">
                <div class="card shadow rounded" style="border: 0;">
                    <div class="card-header bg-dark">
                        <h3 class="text-center text-light"> ADMIN LOGIN FORM</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin_login')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Name</label>
                                <input type="text" class="form-control shadow-none" name="admin_name" id="username"
                                    autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control shadow-none" name="admin_password"
                                    id="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark shadow-none">LOG IN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>