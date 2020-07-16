@extends('layouts.global')

@section("title") Create New Category @endsection

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
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('category.update', $category->id)}}"
            method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">
            <label for="name">Name Category</label>
    <input class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Category Name" type="text" name="name" id="name" value="{{$category->name}}" />
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Save" />
        </form>
    </div>
</div>
@endsection
