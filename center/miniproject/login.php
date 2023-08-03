<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form text-center overflow-hidden rounded shadow bg-white">
            <h4 class="text-center bg-dark text-light py-3">LOG IN FORM</h4>
            <div class="p-4">
                <form action="">
                    <div class="mb-3">
                        <!-- <label>Name/Email</label> -->
                        <input type="text" class="form-control shadow-none rounded" placeholder="Enter Name/Email">
                    </div>
                    <div class="mb-3">
                        <!-- <label>Password</label> -->
                        <input type="password" class="form-control shadow-none rounded" placeholder="Enter Password">
                    </div>
                    <div>
                        <button class="btn btn-dark shadow-none">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>