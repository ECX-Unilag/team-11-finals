<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::id();
        /**
         * Remember to change id to auth()->user()->id and remove id parameter
         */
        return view('checkout')
        ->with('cart', Cart::where('user_id', $id)->get())
        ->with('product', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'product' => 'required | min:3',
        ]);*/
        $product = Product::find('id', $request->input('product'));
        $cart = new Cart([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'price' => $product->cost,
            'quantity' => $request->input('quantity'),
        ]);
         
        $cart->save();
        return response(Cart::where('user_id', auth()->user()->id)->get()->jsonSerialize(), Response::HTTP_OK)
            ->with('success','Added to Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show(carts $carts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function destroy(carts $carts)
    {
        $cart->delete();
        return response(Cart::where('user_id', auth()->user()->id)->get()->jsonSerialize(), Response::HTTP_OK)
            ->with('success','Removed from Cart');
    }
}
