@extends('dashboard_layout')
@section('title','Users')
@push('css')
<style>
    img{
        height: 70px;
        width: 70px;
        border-radius: 50%;
    }
</style>
    
@endpush
@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Users</h1>
    </div>
    <div class="table table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th width="25%" class="text-wrap">Address</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $id=>$user)<tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->city}}</td>
                    <td>{{$user->address}}</td>
                    <td>
                        <img src="uploads/{{$user->photo}}">
                    </td>
                    <td>
                        <a href="{{url('/delete_user')}}{{$user->id}}"><i class="bi bi-trash-fill" style="color: red;font-size:30px"></i></a>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection