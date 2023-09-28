@extends('layout')
@section('title',"Index")
@section('content')
<div class="mt-3">
    <h1 class="text-center"><u>Sign Up Form</u></h1>
</div>
<div>
    <form action="{{url('submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control shadow-none">
            <section id="name_err"></section>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control shadow-none">
            <section id="email_err"></section>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control shadow-none">
            <section id="phone_err"></section>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" name="image" id="phone" class="form-control shadow-none">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control shadow-none">
            <section id="password_err"></section>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Confrim Password</label>
            <input type="password" name="c_password" id="c_password" class="form-control shadow-none">
            <section id="phone_err"></section>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </div>
    </form>
</div>

@endsection