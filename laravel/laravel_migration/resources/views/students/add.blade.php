@extends('students.layout')
@section('title','Add Student')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center fw-bold mt-2">Fill Your Details</h1>
        </div>
        <form action="{{route('add.student')}}" method="post">
            @csrf
            <div class="col-md-6">
                <div class="mb-3">
                    <lable class="form-label">Name</lable>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <lable class="form-label">Email</lable>
                    <input type="text" name="email" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <lable class="form-label">Age</lable>
                    <input type="text" name="age" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <dib class="mb-3">
                    <lable class="form-label">Phone</lable>
                    <input type="text" name="phone" class="form-control">
                </dib>
            </div>
            <div class="col-12 mt-1">
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
        </form>
    </div>
</div>
@endsection