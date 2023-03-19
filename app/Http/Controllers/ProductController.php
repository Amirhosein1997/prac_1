<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:sanctum')->only('update','destroy','store');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product=Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'feature'=>$request->feature,
            'description'=>$request->description,
        ]);
        return response()->json('product created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=Product::find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product=Product::find($id);
        $product->update([
           'name'=>$request->name,
            'price'=>$request->price,
            'feature'=>$request->feature,
            'description'=>$request->description
        ]);
        return response()->json('product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        $product->delete();
    }
}
