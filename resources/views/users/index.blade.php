@php
$no = 1;
@endphp
@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mx-auto">
                @if(session('status'))
                <div class="alert alert-danger">
                    {{session('status')}}
                </div>
                @endif
                <a href="{{route("user.create")}}"><button class="btn btn-primary d-block mb-2">Add User</button></a>
                <h5>User List</h5>
                <table class="table table-bordered table-hover">
                    <thead class="border-0">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->roles}}</td>
                            <td><a href="{{ route('user.edit', [$user->id]) }}"><button class="btn btn-warning btn-sm">Update</button></a> |
                                <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline"
                                    action="{{route('user.destroy', [$user->id])}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
