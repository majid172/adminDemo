<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function list()
    {
        $pageTitle = 'Shop Wishlist';
        return view($this->activeTemplate.'user.shop.wishList',compact('pageTitle'));
    }
}
