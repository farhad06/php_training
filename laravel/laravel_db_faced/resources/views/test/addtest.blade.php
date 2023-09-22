@extends('test.layout')
@section('title','show')
@section('content')
<form action="{{url('/submit')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" class="form-control shadow-none">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" name="image" class="form-control shadow-none">
    </div>
    <div>
        <button type="submit" class="btn btn-dark shadow-none">ADD</button>
    </div>
</form>

@endsection