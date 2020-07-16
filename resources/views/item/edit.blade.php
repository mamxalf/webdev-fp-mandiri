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
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('item.update', $item->id)}}"
            method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">
            <label for="name">Name</label>
            <input class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Item Name"
        type="text" name="name" id="name" value="{{$item->name}}" />
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Category</label>
                    <br>
                    <select class="form-control {{$errors->first('id_category') ? "is-invalid": ""}}" id="id_category"
                        name="id_category">
                        <option></option>
                        @foreach ($categories as $category)
                        @if ($category->id === $item->id_category)
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @endif
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        {{$errors->first('id_category')}}
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Brand</label>
                    <br>
                    <select class="form-control {{$errors->first('id_brand') ? "is-invalid": ""}}" id="id_brand"
                        name="id_brand">
                        <option></option>
                        @foreach ($brands as $brand)
                        @if ($brand->id === $item->id_brand)
                        <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                        @endif
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        {{$errors->first('id_brand')}}
                    </div>
                </div>
            </div>
            <br>
            <hr class="my-3">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Code</label>
                    <br>
                    <input class="form-control {{$errors->first('code') ? "is-invalid": ""}}" placeholder="Item code"
                        type="text" name="code" id="code" value="{{$item->code}}" disabled/>
                    <div class="invalid-feedback">
                        {{$errors->first('code')}}
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Price</label>
                    <br>
                    <input class="form-control {{$errors->first('price') ? "is-invalid": ""}}" placeholder="Item price"
                        type="number" name="price" id="price" value="{{$item->price}}" />
                    <div class="invalid-feedback">
                        {{$errors->first('price')}}
                    </div>
                </div>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Save" />
        </form>
    </div>
</div>
@endsection
