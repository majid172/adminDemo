<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopListController extends Controller
{
    public function list()
    {
        $pageTitle = "Shop List";
        $products = Product::with('category')->get();
        return view($this->activeTemplate.'user.shop.shopList',compact('pageTitle','products'));
    }

    public function singleShop($id)
    {
        $pageTitle = "Single Shop";
        $product = Product::where('id',$id)->with('category')->first();
        return view($this->activeTemplate.'user.shop.singleShop',compact('pageTitle','product'));
    }
}
