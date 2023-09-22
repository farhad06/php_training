@extends('test.layout')
@section('title','edit')
@section('content')
<form action="{{url('/update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" class="form-control shadow-none" value="{{$data->name}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" name="image" class="form-control shadow-none">
        <section>
            <img src="test-image/{{$data->image}}" alt="" height="70px" width="70px">
        </section>
        <input type="hidden" name="id" id="" value="{{$data->id}}">
    </div>
    <div>
        <button type="submit" class="btn btn-dark shadow-none">ADD</button>
    </div>
</form>

@endsection