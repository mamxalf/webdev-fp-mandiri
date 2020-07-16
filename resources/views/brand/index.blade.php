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
                <a href="{{route("brand.create")}}"><button class="btn btn-primary d-block mb-2">Add Brand</button></a>
                <h5>Brand List</h5>
                <table class="table table-bordered table-hover">
                    <thead class="border-0">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name Brand</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$brand->name}}</td>
                            <td><a href="{{ route('brand.edit', [$brand->id]) }}"><button class="btn btn-warning btn-sm">Update</button></a> |
                                <form onsubmit="return confirm('Delete this Brand permanently?')" class="d-inline"
                                    action="{{route('brand.destroy', [$brand->id])}}" method="POST">
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
