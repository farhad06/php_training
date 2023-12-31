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
        {{-- @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <ul>
                    <li> {{$error}}</li>
                </ul>
            </div>
        @endforeach     --}}
        {{-- @if(@isset($message))
        <div style="float: right; margin:5px;">
          <section class="alert alert-success">
              {{$message}}
        </section>
        </div>
        @endisset --}}
        <div>
            <h1 class="text-center">Registration Page</h1>
        </div>
        <form action="{{url('/submit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control shadow-none @error('name') is-invalid @enderror">
                <span class="text-danger">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control shadow-none @error('email') is-invalid @enderror">
                <span class="text-danger">
                    @error('email')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="number" name="phone" value="{{old('phone')}}" class="form-control shadow-none @error('phone') is-invalid @enderror">
                <span class="text-danger">
                    @error('phone')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="picture" class="form-control shadow-none">
                <span class="text-danger">
                    @error('picture')
                    {{$message}}
                    @enderror
                </span> 
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control shadow-none">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary shadow-none">Submit</button>
            </div>
        </form>
        @if(@isset($info))
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                </tr>
                <tr>
                    <td>{{$info['name']}}</td>
                    <td>{{$info['email']}}</td>
                    <td>{{$info['phone']}}</td>
                    <td>{{$info['pass']}}</td>
                </tr>
            </table>
        </div>
        @endisset
    </div>

</body>

</html>