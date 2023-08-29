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
<h2>All User</h2>
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
                    <a href="{{url('/delete_user')}}{{$user->id}}"><i class="bi bi-trash-fill"
                            style="color: red;font-size:30px"></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection