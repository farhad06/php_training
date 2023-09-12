@if (!session('user_id'))
<script>
    window.location.href="{{url('/')}}";
</script>
@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User</title>
    <style>
        .btn {
            background-color: #1d64e4;
            color: ghostwhite;
        }

        .btn:hover {
            color: ghostwhite;
        }

        .p-img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="container">
        @if(session('message'))
        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">
            <div class="toast align-items-center bg-info border-0 mt-1 shadow-none" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <span class="h6 text-light">{{session('message')}}</span>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto shadow-none" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <a href="{{url('/')}}" class="text-decoration-none text-secondary">Home</a>
                <h3 class="text-center fw-bold mt-2">Show & Update Your Information</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="bg-white rounded shadow p-3 p-md-4 mb-3 mt-1">
                    <h3 class="text-center fw-bold mb-3">Basic Information</h3>
                    <form action="{{url('/update_basic_info')}}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="user_id" value="{{$data->id}}">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" value="{{$data->name}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Phone</label>
                                <input type="text" name="phone" class="form-control shadow-none"
                                    value="{{$data->phone}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Age</label>
                                <input type="text" name="age" class="form-control shadow-none" value="{{$data->age}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">City</label>
                                <input type="text" name="city" class="form-control shadow-none" value="{{$data->city}}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Address</label>
                                <textarea type="text" name="address" rows="2" class="form-control shadow-none"
                                    style="resize: none;">{{$data->address}}</textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn shadow-none">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white rounded shadow p-3 mt-1 p-md-4">
                    <h3 class="text-center fw-bold mb-3">Profile Picture</h3>
                    <form action="{{url('/update_photo')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="text-center">
                                    <img src="uploads/{{$data->photo}}" class="p-img">
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{$data->id}}">
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Change Profile Picture</label>
                                <input type="file" name="photo" class="form-control shadow-none">
                            </div>
                            <div class="text-center">
                                <button class="btn shadow-none">CHANGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" id="update_password_div">
            <div class="col-12">
                <div class="bg-white rounded shadow p-3 p-md-4 mb-3">
                    <h3 class="text-center fw-bold mb-3">Update Password</h3>
                    <form action="javascript:void(0)" method="post" id="update_password_form">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" name="password" class="form-control shadow-none" id="up_dt_pas">
                            </div>
                            <div class="col-md-5">
                                <input type="hidden" name="user_id" value="{{$data->id}}">
                                <label class="form-label fw-bold">Confirm Password</label>
                                <input type="password" name="c_password" class="form-control shadow-none"
                                    id="up_dt_cpas">
                            </div>
                            <div class="col-md-2" style="margin-top: 30px;">
                                <button class="btn shadow-none">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        var hostUrl = "{{url('/')}}";
        $(document).ready(function(){
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "processBar": true
            }
        })
    </script>
    <script src="{{ asset('assets/js/updatepassword.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        var toast = new bootstrap.Toast(document.querySelector('.toast'));
      toast.show();
    </script>
</body>

</html>