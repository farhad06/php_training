@extends('dashboard_layout')
@section('title','Edit Item')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="centered-div">
                <h3 class="text-center mb-2"><u>Edit Item</u></h3>
                <form action="{{url('/updateitem')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Item Name</strong></label>
                        <input type="text" name="i_name" class="form-control shadow-none" value="{{$data->i_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Item Price</strong></label>
                        <input type="number" name="i_price" class="form-control shadow-none" value="{{$data->price}}">
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label"><strong>Item Image</strong></label>
                        <input type="file" name="i_image" class="form-control shadow-none mb-2">
                        <span class="mb-3"><img src="items_images/{{$data->i_image}}" alt="Item Image" width="68px" height="60px"></span>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label"><strong>Item Description</strong></label>
                        <textarea type="text" name="i_desc" class="form-control shadow-none" rows="2"
                            style="resize: none;">{{$data->i_desc}}</textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-success shadow-none">EDIT ITEM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection