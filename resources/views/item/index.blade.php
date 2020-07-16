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
                <a href="{{route("item.create")}}"><button class="btn btn-primary d-block mb-2">Add Item</button></a>
                <h5>Items List</h5>
                <table class="table table-bordered table-hover">
                    <thead class="border-0">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Code Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            @foreach ($categories as $category)
                                @if ($item->id_category === $category->id)
                                <td>{{$category->name}}</td>
                                @endif
                            @endforeach
                            @foreach ($brands as $brand)
                                @if ($item->id_brand === $brand->id)
                                <td>{{$brand->name}}</td>
                                @endif
                            @endforeach
                            <td>{{$item->name}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->price}}</td>
                            <td><a href="{{ route('item.edit', [$item->id]) }}"><button class="btn btn-warning btn-sm">Update</button></a> |
                                <form onsubmit="return confirm('Delete this Item permanently?')" class="d-inline"
                                    action="{{route('item.destroy', [$item->id])}}" method="POST">
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
