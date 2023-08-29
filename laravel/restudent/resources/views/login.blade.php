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
            #logInForm{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                width: 500px;
            }
        </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6" id="logInForm">
            <div class="card shadow rounded" style="border: 0;">
                <div class="card-header">
                    <h3 class="text-center">LOGIN FORM</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control shadow-none" id="username" placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none" id="password" placeholder="Enter your password">
                        </div>
                        <div class="text-center mb-2">
                            <span class="text-dark text-center">New User? Register<a href="{{url('/register')}}" class="text-decoration-none">&nbsp;Here</a></span>
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