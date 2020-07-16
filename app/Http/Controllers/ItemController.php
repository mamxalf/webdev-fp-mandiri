<?php

namespace App\Http\Controllers;

use App\Item;
use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item = Item::all();
        $brand = Brand::all();
        $category = Category::all();

        $data = [
            'items' => $item,
            'brands' => $brand,
            'categories' => $category
        ];
        return view('item.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brand = Brand::all();
        $category = Category::all();
        $data = [
            'brands' => $brand,
            'categories' => $category
        ];
        return view('item.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        \Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "id_category" => "required",
            "id_brand" => "required",
            "code" => "required|min:5",
            "price" => "required",
        ])->validate();

        $new_item = new Item;

        $new_item->name = $request->get('name');
        $new_item->id_category = $request->get('id_category');
        $new_item->id_brand = $request->get('id_brand');
        $new_item->code = $request->get('code');
        $new_item->price = $request->get('price');
        $new_item->save();

        return redirect()->route('item.create')->with('status', 'Item successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
