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
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('user.store')}}"
            method="POST">
            @csrf
            <label for="name">Name</label>
            <input class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Full Name" type="text" name="name" id="name" />
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br>
            <label for="username">Username</label>
            <input class="form-control {{$errors->first('username') ? "is-invalid": ""}}" placeholder="username" type="text" name="username" id="username" />
            <div class="invalid-feedback">
                {{$errors->first('username')}}
            </div>
            <br>

            <label for="">Roles</label>
            <br>
            <select class="form-control {{$errors->first('roles') ? "is-invalid": ""}}" id="roles" name="roles">
                <option></option>
                <option>ADMIN</option>
                <option>OPERATOR</option>
            </select>
            <div class="invalid-feedback">
                {{$errors->first('roles')}}
            </div>
            <br>
            <hr class="my-3">
            <label for="email">Email</label>
            <input class="form-control {{$errors->first('email') ? "is-invalid": ""}}" placeholder="user@mail.com" type="text" name="email" id="email" />
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>
            <br>
            <label for="password">Password</label>
            <input class="form-control {{$errors->first('password') ? "is-invalid": ""}}" placeholder="password" type="password" name="password" id="password" />
            <div class="invalid-feedback">
                {{$errors->first('password')}}
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Save" />
        </form>
    </div>
</div>
@endsection
