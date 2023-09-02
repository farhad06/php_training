<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Fill The Form</h1>
        <hr>
        @if(session('message'))
            <h3 class="text-success">{{session('message')}}</h3>
        @endif
        <form action="{{url('/submit')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" class="form-control shadow-none">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea type="text" name="des" rows="3" class="form-control shadow-none"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
        </form>
    </div>
  
</body>

</html>