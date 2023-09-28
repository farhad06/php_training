@extends('dashboard_layout')
@section('title','Chefs')
@push('css')
<style>
    img {
        height: 70px;
        width: 70px;
    }
</style>
@endpush
@section('content')
<h1 class="h2 text-center mb-3">All Chefs</h1>
<div class="table table-responsive">
    <div class="mb-3">
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
        <button type="button" class="btn btn-sm btn-dark shadow-none" data-toggle="modal" data-target="#addChef"><i
                class="bi bi-plus-circle-fill"></i> Add Chef</button>
    </div>
    <div class="table table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Chef Name</th>
                    <th>Spacilist</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $id=>$item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->spacilist}}</td>
                    <td>
                        <img src="chefs_images/{{$item->image}}">
                    </td>
                    <td>
                        {{-- <a href="#editItem{{$item->id}}" data-toggle="modal" data-target="#editItem"><i
                            class="bi bi-pencil-square" style="color:green; font-size:30px;"></i></a> --}}
                        <a href="{{url('/editchef')}}{{$item->id}}"><i class="bi bi-pencil-square"
                                style="color:green; font-size:30px;"></i></a>
                        <a href="{{url('/deletechef')}}{{$item->id}}"><i class="bi bi-trash3-fill"
                                style="color: red; font-size:30px;"></i></a>&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Add Modal -->
<div class="modal fade" id="addChef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center h4" id="exampleModalLabel">Add Chef</h5>
                <button type="button" class="shadow-none close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/addchef')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Chef Name</strong></label>
                        <input type="text" name="c_name" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Spacilist</strong></label>
                        <input type="text" name="c_spacilist" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><strong>Item Image</strong></label>
                        <input type="file" name="c_image" class="form-control shadow-none">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-dark shadow-none">ADD CHEF</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Add Modal End --}}

@endsection