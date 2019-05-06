@extends('layouts.app')

@section('content')

   

    <form action="{{route('users.update', ['id' => $user->id])}}" style="margin-top:100px;" enctype="multipart/form-data" class="bg-white shadow-sm p-3" method="POST">


    <h1>Edit User {{$user->name}}</h1> <br>
    @csrf
        <input type="hidden" value="PUT" name="_method">
        <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" name="name" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}"" value="{{old('name') ? old('name') : $user->name}}">
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" class="form-control {{$errors->first('email') ? "is-invalid" : ""}}""  value="{{old('email') ? old('email') : $user->email}}">
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm">upload</button>
        <a href="{{route('users.index')}}" class="btn btn-danger btn-sm">Back to Home</a>

    </form>

@endsection