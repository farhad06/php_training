<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <div>
        <h1 class="text-center">Update Page</h1>
    </div>
    @if(isset($data))
  
    <form action="{{url('/update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" value="{{$data->id}}">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" value="{{$data->name}}"
                class="form-control shadow-none">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" value="{{$data->email}}"
                class="form-control shadow-none">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Phone</label>
            <input type="number" name="phone" value="{{$data->phone}}"
                class="form-control shadow-none">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" name="picture" class="form-control shadow-none">
            <section><img src="uploads/{{$data->image}}" height="68px" width="68px"></section>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success shadow-none">Update</button>
        </div>
    </form>
    @endif
    </div>
    </div>

</body>

</html>