@extends('dashboard_layout')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    <h1 class="text-center fw-bold mb-4"
        style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
        Welcome To Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="" class="text-decoration-none">
                <div class="card text-center text-success p-3 rounded shadow">
                    <h5>Total Bookings</h5>
                    <h1 class="mt-2 mb-0">{{$count_book}}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{url('/allusers')}}" class="text-decoration-none">
                <div class="card text-center text-info p-3 rounded shadow">
                    <h5>Total Users</h5>
                    <h1 class="mt-2 mb-0">{{$count_user}}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{url('/allfood')}}" class="text-decoration-none">
                <div class="card text-center text-primary p-3 rounded shadow">
                    <h5>Total Items</h5>
                    <h1 class="mt-2 mb-0">{{$count_item}}</h1>
                </div>
            </a>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="chart-container">
                <h3>Monthly Sales</h3>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div> --}}
</div>
@endsection