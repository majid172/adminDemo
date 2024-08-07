<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\GatewayCurrency;
use App\Models\ServiceFee;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($userId)
    {
        $pageTitle  = "Checkout";
        $carts = Cart::where('user_id',$userId)->with(['user','products'])
                ->whereHas('user',function ($q){
                    $q->where('user_id',auth()->user()->id);
                })->get();
        $subTotal = $carts->map(function ($cart) {
            return $cart->quantity * $cart->products->price;
        })->sum();
        $fee = ServiceFee::first();

        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();

        return view($this->activeTemplate.'user.shop.checkout',compact('pageTitle','carts','subTotal','fee','gatewayCurrency'));
    }
}
