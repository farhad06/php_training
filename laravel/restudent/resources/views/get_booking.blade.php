@extends('dashboard_layout')
@section('title','Users')
@push('css')
@endpush
@section('content')
<h2 class="text-center mb-3">Bookings</h2>
@if(session('message'))
<div style="float: right;" id="resDiv">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong style="color: black">{{session('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
<div class="table table-responsive">
    <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>No of Guests</th>
                <th>Date</th>
                <th>Time</th>
                <th>Booking Id</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $id=>$user)<tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->number_guests}}</td>
                <td>{{$user->date}}</td>
                <td>{{$user->time}}</td>
                <td>{{$user->b_id}}</td>
                <td>{{$user->message}}</td>
                <td>
                    <a href="{{url('/deletebooking')}}{{$user->id}}"><i class="bi bi-x-octagon-fill" style="color: red; font-size:30px;"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection