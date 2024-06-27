<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderList()
    {
        $pageTitle = "My Orders";
        return view($this->activeTemplate.'user.order.orderList',compact('pageTitle'));
    }
    public function orderStore(Request $request)
    {
        $request->validate([
            'amount' => 'required'
        ]);
        $user_id = auth()->user()->id;
        $order = new Order();
        $order->user_id = $user_id;
        $order->status = 1;
        $order->save();

        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_id = json_encode($request->product_id);
        $orderItem->amount = $request->amount;
        $orderItem->save();
        return back();
    }
}
