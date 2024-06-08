<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $pageTitle  = "Checkout";
        return view($this->activeTemplate.'user.shop.checkout',compact('pageTitle'));
    }
}
