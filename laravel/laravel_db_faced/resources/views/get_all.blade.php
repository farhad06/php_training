<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>All Data</title>
</head>
<body>
    <div class="container">
        <div class="mt-3">
            <a href="{{url('/signup')}}" class="sticky-top"><button class="btn btn-dark text-light shadow-none">ADD</button></a>
            @if(session('message'))
            <section class="text-success text-center fw-bold fs-40" id="resMsg">
                {{session('message')}}
            </section>
            @endif
        </div>
        @if (isset($details))
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($details->all() as $stu_details)
                <tr>
                    <td>{{$stu_details->name}}</td>
                    <td>{{$stu_details->email}}</td>
                    <td>{{$stu_details->phone}}</td>
                    <td><img src="uploads/{{$stu_details->image}}" height="68px" width="68px"></td>
                    <td>
                        <a href="{{url('/edit')}}{{$stu_details->id}}"><button class="btn btn-sm btn-success shadow-none">UPDATE</button></a>
                        <a href="{{url('/delete')}}{{$stu_details->id}}"><button class="btn btn-sm btn-danger shadow-none" onclick="return confirm('Are You Sure? Want to Delete it!');">DELETE</button></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        @endisset
        {{-- <img src="uploads/IMG_1692463559.png" height="68px" width="68px"> --}}

        @section('scripts')
        <script>
            //let resMsg=document.getElementById('resMsg');
            setTimeout(removeResMsg,3000);
            function removeResMsg(){
                document.getElementById('resMsg').remove();
            }
        </script>
            
        @endsection

    </div>
</body>
</html>