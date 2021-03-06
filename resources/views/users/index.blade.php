@extends('layouts.app')

@section('content')

    @if(session('delet'))
        <div class="alert alert-danger">{{session('delet')}}</div>
    @endif

    <div class="row" style="margin-top: 100px;">
    
        <div class="col-md-8">
        <form action="{{route('users.index')}}">
            <div class="form-group">
            <input  placeholder="masukan nama yang ingin dicari" type="text" class="form-control" type="text" name="keyword" value="{{Request::get('keyword')}}">
            </div>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-dark btn-md">Filter</button>
            <a href="{{route('users.create')}}" class="btn btn-success btn-md">Create</a>
            </form>
        </div>
    </div>

<div class="row" style="margin-top: 10px;">
    
    <div class="col-md-12">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>Email</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 0?>
        @foreach($users as $user)
        <?php $no++?>
        <tr>
            
            <td>{{$no}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{route('users.edit', ['id' => $user->id])}}" class="btn btn-primary btn-sm">edit</a>
                <form action="{{route('users.destroy', ['id'=>$user->id])}}"  class="d-inline"
                    onsubmit="return confirm('yakin mai di delete ini User?')"
                    method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">

                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>
                <a href="{{route('users.show', ['id' => $user->id])}}" class="btn btn-success btn-sm">Detail</a>
            </td>

        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan=10>
                    {{$users->links()}}
                </td>
            </tr>
        </tfoot>
    </table>
    </div> 
    </div>
@endsection


