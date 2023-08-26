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
        <a href="{{url('/')}}"><button class="btn btn-secondary">ADD</button></a>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Team</th>
                <th>High Score</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach ($data as $id=>$d)
                <tr>
                    <td>{{$d->name}}</td>
                    <td>{{$d->team}}</td>
                    <td>{{$d->high_score}}</td>
                    <td>
                        <img src="uploads/{{$d->image}}" style="height: 70px;width:70px;border-radius:50%;">
                    </td>
                    <td>
                        <a href="{{url('/edit_player')}}{{$d->id}}" class="btn btn-sm btn-success">UPDATE</a>
                        <a href="{{url('/delete_player',$d->id)}}" class="btn btn-sm btn-danger">DELETE</a>
                    </td>
                </tr>
                    
                @endforeach
               
            </tbody>
        </table>
    </div>
</body>
</html>