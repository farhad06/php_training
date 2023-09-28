@extends('layout')
@section('title',"Index")
@section('content')
<div class="mt-3">
    <a href="{{url('/add')}}" class="btn btn-sm btn-primary shadow-none">ADD</a>
    <h1 class="text-center"><u>All Students</u></h1>
    <section style="float: right;">
        @if (session('message'))
            <h3 class="text-success fw-bold">{{session('message')}}</h3>
        @endif
    </section>
</div>
<div class="table table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($data->all() as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>
                <img src="uploads/{{$item->image}}" alt="Image" height="68px" width="68px">
            </td>
            <td>
                <a href="{{url('/edit')}}{{$item->id}}" class="btn btn-sm btn-success shadow-none">UPDATE</a>
                <a href="{{url('/delete')}}{{$item->id}}" class="btn btn-sm btn-danger shadow-none">DELETE</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection