<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $pageTitle = 'Shop Cart';
        return view($this->activeTemplate.'user.shop.cart',compact('pageTitle'));
    }
}
