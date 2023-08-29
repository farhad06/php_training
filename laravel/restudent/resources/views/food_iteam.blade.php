@extends('dashboard_layout')
@section('title','Users')
@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Food Items</h1>
    </div>
    <div class="table table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection