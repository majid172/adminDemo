<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function list()
    {
        $pageTitle = 'My Wishlist';
        $wishlists = Wishlist::where('user_id',auth()->user()->id)->with(['user','products'])->get();
        $count = $wishlists->count();
        return view($this->activeTemplate.'user.shop.wishList',compact('pageTitle','count','wishlists'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>'required'
        ]);
        $user_id = auth()->user()->id;
        $exists = Wishlist::where([
                    'user_id' => $user_id,
                    'product_id' => $request->product_id
                ])->exists();
        if ($exists){
            $notify[] = ['error','Product already exists.'];
            return back()->withNotify($notify);
        }
        $wishlist = new Wishlist();
        $wishlist->user_id = $user_id;
        $wishlist->product_id = $request->product_id;
        $wishlist->save();
        $notify[] = ['success','Add wishlist successfully.'];
        return back()->withNotify($notify);
    }
    public function remove(Request $request)
    {
        $remove = Wishlist::find($request->id);
        $remove->delete();
        $notify[] = ['success','Product removes from wishlist'];
        return back()->withNotify($notify);
    }
}
