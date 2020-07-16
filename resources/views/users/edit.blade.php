@extends('layouts.global')

@section("title") Create New User @endsection

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-12">

        </div>
    </div> --}}
    <div class="col-md-8">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('user.update', $user->id)}}"
            method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">
            <label for="name">Name</label>
    <input class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Full Name" type="text" name="name" id="name" value="{{$user->name}}" />
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br>
            <label for="username">Username</label>
            <input class="form-control {{$errors->first('username') ? "is-invalid": ""}}" placeholder="username" type="text" name="username" id="username" value="{{$user->username}}" />
            <div class="invalid-feedback">
                {{$errors->first('username')}}
            </div>
            <br>

            <label for="">Roles</label>
            <br>
            <input class="form-control {{$errors->first('roles') ? "is-invalid": ""}}" placeholder="roles" type="text" name="roles" id="roles" value="{{$user->roles}}" disabled/>
            {{-- <select class="form-control {{$errors->first('roles') ? "is-invalid": ""}}" id="roles" name="roles">
                @if ($user->roles === 'ADMIN')
                <option selected>ADMIN</option>
                @endif
                @if ($user->roles === 'OPERATOR')
                <option selected>OPERATOR</option>
                @endif
                <option></option>
            </select> --}}
            <div class="invalid-feedback">
                {{$errors->first('roles')}}
            </div>
            <br>
            <hr class="my-3">
            <label for="email">Email</label>
            <input class="form-control {{$errors->first('email') ? "is-invalid": ""}}" placeholder="user@mail.com" type="text" name="email" id="email" value="{{$user->email}}" />
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>
            <br>
            {{-- <label for="password">Password</label>
            <input class="form-control {{$errors->first('password') ? "is-invalid": ""}}" placeholder="password" type="password" name="password" id="password" value="{{$user->password}}" />
            <div class="invalid-feedback">
                {{$errors->first('password')}}
            </div>
            <br> --}}
            <input class="btn btn-primary" type="submit" value="Save" />
        </form>
    </div>
</div>
@endsection
