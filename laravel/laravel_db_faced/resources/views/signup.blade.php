<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div>
            <h1 class="text-center">Registration Page</h1>
        </div>
        <form action="{{url('/submit')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control shadow-none">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary shadow-none">Submit</button>
            </div>
        </form>
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                </tr>
                @if(@isset($info))
                <tr>
                    <td>{{$info['name']}}</td>
                    <td>{{$info['email']}}</td>
                    <td>{{$info['phone']}}</td>
                    <td>{{$info['pass']}}</td>
                </tr>
                @endisset

            </table>

        </div>
    </div>

</body>

</html>