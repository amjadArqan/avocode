<?php

namespace App\Http\Controllers;

use App\Cart as AppCart;
use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = 1 ;
        $cartsCount = AppCart::where('user_id',$user_id)->count();

        $carts = AppCart::where('user_id',$user_id)->get();
        return view('cart',compact('carts','cartsCount'));
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
        $user_id  = 1; /** or store it on session and increase life time of session from config */
        $product = Product::find($request->product_id);
        $item = \Cart::add($product->id, $product->name, $product->price, 1);
        $cart = new AppCart();
        $cart->user_id = $user_id;

        $cart->product_id = $product->id;
        $cart->quantity =1;
        $cart->price = $product->price;
        $cart->save();
        session()->put('cart',[$cart]);


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
