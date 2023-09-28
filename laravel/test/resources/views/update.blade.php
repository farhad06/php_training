@extends('layout')
@section('title',"Index")
@section('content')
<div class="mt-3">
    <h1 class="text-center"><u>Update Form</u></h1>
</div>
<div>
    <form action="{{url('update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control shadow-none" value={{$data->name}}>
            <section id="name_err"></section>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control shadow-none" value={{$data->email}}>
            <section id="email_err"></section>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control shadow-none" value={{$data->phone}}>
            <section id="phone_err"></section>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" name="image" id="phone" class="form-control shadow-none">
            <section class="mt-2">
                <img src="uploads/{{$data->image}}" alt="Image" height="68px" width="68px">
            </section>
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
        <input type="hidden" name="id" value={{$data->id}}>
        <div>
            <button type="submit" class="btn btn-success">UPDATE</button>
        </div>
    </form>
</div>

@endsection