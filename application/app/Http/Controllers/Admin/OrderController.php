<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    {
        $pageTitle = "Order List";
        $orders = Order::with(['orderItems.products','user'])->paginate(getPaginate(15));
        return view('admin.orders.list',compact('pageTitle','orders'));
    }
    public function details($orderId)
    {
        $pageTitle = "Oder Details";
        $detail = Order::where('id',$orderId)->with('orderItems.products','paymentMethod')->first();
//dd($detail->toArray());
        return view('admin.orders.details',compact('pageTitle','detail'));
    }

    public function statusUpdate(Request $request)
    {
        $order = Order::where('id',$request->orderId)->first();
        $order->status = $request->status;
        $order->save();
        return response()->json('Success',200);
    }
}
