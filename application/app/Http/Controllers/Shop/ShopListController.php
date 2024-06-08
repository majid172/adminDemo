<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopListController extends Controller
{
    public function list()
    {
        $pageTitle = "Shop List";
        return view($this->activeTemplate.'user.shop.shopList',compact('pageTitle'));
    }
}
