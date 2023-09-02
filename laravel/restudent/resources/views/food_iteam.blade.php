@extends('dashboard_layout')
@section('title','Items')
@push('css')
<style>
    img {
        height: 50px;
        width: 80px;
    }
</style>
@endpush
@section('content')
<h1 class="h2 text-center mb-3">Food Items</h1>
<div class="table table-responsive">
    <div class="mb-3">
        @if(session('message'))
        <div style="float: right;">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong style="color: black">{{session('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        <button type="button" class="btn btn-sm btn-dark shadow-none" data-toggle="modal" data-target="#addItem"><i
                class="bi bi-plus-circle-fill"></i> Add Items</button>
    </div>
    <div class="table table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $id=>$item)
                <tr>
                    <td>{{$item->i_name}}</td>
                    <td>{{$item->price}}</td>
                    <td>
                        <img src="items_images/{{$item->i_image}}">
                    </td>
                    <td>{{$item->i_desc}}</td>
                    <td>
                        <a href="{{url('/edititem')}}{{$item->id}}"><i class="bi bi-pencil-square"
                                style="color:green; font-size:30px;"></i></a>
                        <a href="{{url('/deleteitem')}}{{$item->id}}"><i class="bi bi-trash3-fill"
                                style="color: red; font-size:30px;"></i></a>&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center h4" id="exampleModalLabel">Add Item</h5>
                <button type="button" class="shadow-none close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/additem')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Item Name</strong></label>
                        <input type="text" name="i_name" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Item Price</strong></label>
                        <input type="number" name="i_price" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Item Image</strong></label>
                        <input type="file" name="i_image" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Item Description</strong></label>
                        <textarea type="text" name="i_desc" class="form-control shadow-none" rows="2"
                            style="resize: none;"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-dark shadow-none">ADD ITEM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection