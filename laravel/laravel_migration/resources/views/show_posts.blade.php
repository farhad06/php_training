<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center fw-bold fst-italic">All Posts</h2>
        @if(session('message'))
        <h3 class="text-success">{{session('message')}}</h3>
        @endif
        <div class="table table-responsive">
            <table class="table table-bordered border-dark">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th width="15%">Action</th>
                    </tr>
                <tbody>
                    @if(isset($data))
                    @foreach($data->all() as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>
                            <a href="{{url('/editpost')}}{{$post->id}}" class="btn btn-sm btn-success">UPDATE</a>
                            <a href="{{url('/deletepost')}}{{$post->id}}" class="btn btn-sm btn-danger">DELETE</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                </thead>
            </table>
        </div>
    </div>

</body>

</html>