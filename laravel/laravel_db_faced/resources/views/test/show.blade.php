@extends('test.layout')
@section('title','show')
@section('content')
<div>
    <a href="{{url('/addtest')}}" class="btn btn-sm btn-primary mt-3 mb-3">ADD TEST</a>
    <section style="float: right">
        @if (session('message'))
            <h3 class="text-success fw-bold">{{session('message')}}</h3>
        @endif
    </section>
</div>
<div class="table table-responsive">
<table class="table table-bordered ">
    <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    @foreach ($data->all() as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td><img src="test-image/{{$item->image}}" alt="" height="70px" width="70px"></td>
        <td>
            <a href="{{url('/editpost')}}{{$item->id}}" class="btn btn-sm btn-success shadow-none">UPDATE</a>
            <a href="{{url('/deletepost')}}{{$item->id}}" class="btn btn-sm btn-danger shadow-none">DELETE</a>
        </td>
    </tr>
    @endforeach
</table>
</div>
    
@endsection