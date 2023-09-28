@extends('dashboard_layout')
@section('title','Edit Item')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="centered-div">
                <h3 class="text-center mb-2"><u>Edit Chef</u></h3>
                <form action="{{url('/updatechef')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Name</strong></label>
                        <input type="text" name="c_name" class="form-control shadow-none" value="{{$data->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Spacilist</strong></label>
                        <input type="text" name="c_spacilist" class="form-control shadow-none"
                            value="{{$data->spacilist}}">
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label"><strong>Image</strong></label>
                        <input type="file" name="c_image" class="form-control shadow-none mb-2">
                        <span class="mb-3"><img src="chefs_images/{{$data->image}}" alt="Item Image" width="68px"
                                height="60px"></span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-success shadow-none">EDIT CHEF</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection