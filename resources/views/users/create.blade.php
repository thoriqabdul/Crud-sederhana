@extends('layouts.app')

@section('content')

    @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif

    <form action="{{route('users.store')}}" style="margin-top:100px;" enctype="multipart/form-data" class="bg-white shadow-sm p-3" method="POST">

    @csrf

        <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" name="name" class="form-control {{$errors->first('name') ? " is-invalid": ""}}" value="{{old('name')}}">
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input value="{{old('email')}}" type="email" name="email" class="form-control {{$errors->first('email') ? " is-invalid": ""}}"">
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm">upload</button>

    </form>

@endsection