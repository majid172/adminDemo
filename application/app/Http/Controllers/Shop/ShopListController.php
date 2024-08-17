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

    public function filterList($categorytId)
    {
        $pageTitle = "Shop List";
        $query = Category::with('products');
        $categories = $query->get();
        $title = Category::where('id',$categorytId)->first();

        $products = Product::with('category')->where('cat_id',$categorytId)->paginate(getPaginate(12));
        return view($this->activeTemplate.'user.shop.shopList',compact('pageTitle','products','categories','title'));
    }
    public function singleShop($id)
    {
        $pageTitle = "Single Shop";
        $product = Product::where('id',$id)->with('category')->first();
        return view($this->activeTemplate.'user.shop.singleShop',compact('pageTitle','product'));
    }
}
