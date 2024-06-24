<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopListController extends Controller
{
    public function list()
    {
        $pageTitle = "Shop List";
        $categories = Category::with('products')->get();
        $products = Product::with('category')->paginate(getPaginate(12));

        return view($this->activeTemplate.'user.shop.shopList',compact('pageTitle','products','categories'));
    }

    public function singleShop($id)
    {
        $pageTitle = "Single Shop";
        $product = Product::where('id',$id)->with('category')->first();
        return view($this->activeTemplate.'user.shop.singleShop',compact('pageTitle','product'));
    }
}
