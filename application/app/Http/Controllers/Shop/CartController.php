<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ServiceFee;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $pageTitle = 'Shop Cart';
        $carts = \App\Models\Cart::where('user_id',auth()->user()->id)->with(['user','products'])->get();
        $subTotal = $carts->map(function ($cart) {
            return $cart->quantity * $cart->products->price;
        })->sum();
        $charge = ServiceFee::first();
        return view($this->activeTemplate.'user.shop.cart',compact('pageTitle','carts','subTotal','charge'));
    }
    public function store(Request $request)
    {
        $exists = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $request->product_id)
            ->exists();
        if($exists){
            return response()->json('Product exists');
        }
        try {
            $cart = new Cart();
            $cart->user_id = $request->user_id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->unit = $request->unit;
            $cart->save();

            return response()->json('success', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function addCart(Request $request)
    {
        $exists = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $request->product_id)
            ->exists();
        if($exists){
            $notify[] = ['error','Product already exists'];
            return back()->withNotify($notify);
        }
        try {
            $cart = new Cart();
            $cart->user_id = $request->user_id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->unit = $request->unit;
            $cart->save();
            $notify[] = ['success','Product add to cart'];
            return back()->withNotify($notify);
        } catch (\Exception $e) {
            $notify[] = ['error',$e->getMessage()];
            return back()->withNotify($notify);

        }
    }

    public function remove(Request $request)
    {
        $cart = Cart::findOrFail($request->id);
        $cart->delete();
        $notify[] = ['success','Cart remove successfully'];
        return back()->withNotify($notify);

    }
}
