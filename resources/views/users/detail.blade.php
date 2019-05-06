@extends('layouts.app')

@section('content')

   

    <form action="{{route('users.update', ['id' => $user->id])}}" style="margin-top:100px;" enctype="multipart/form-data" class="bg-white shadow-sm p-3" method="POST">

    @csrf
        <input type="hidden" value="PUT" name="_method">
        <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" name="name" class="form-control" disabled value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" class="form-control" disabled value="{{$user->email}}">
        </div>
        <a href="{{route('users.index')}}" class="btn btn-danger btn-sm">Back to Home</a>

    </form>

@endsection