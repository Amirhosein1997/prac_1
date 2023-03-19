<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:sanctum');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts=Cart::all();
        return response()->json($carts);
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
        $user_id=auth()->user()->id;
        $products=implode(',',[$request->product_id]);
        $cart=Cart::create([
            'product_id'=>$products,
            'user_id'=>$user_id,
        ]);
        return response()->json('cart created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cart=Cart::find($id);
        return response()->json($cart);
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
        $user_id=auth()->user()->id;
        $cart=Cart::find($id);
        $product_ids=implode(',',[$request->product_id]);
        $cart->update([
           'product_id'=>$product_ids,
            'user_id'=>$user_id,
        ]);
        return response()->json('update is done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return response()->json('cart is deleted');
    }
}
