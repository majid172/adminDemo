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
    public function details($orderItemId)
    {
        $pageTitle = "Oder Details";
        $detail = OrderItem::where('id',$orderItemId)->with('order')->first();

        return view('admin.orders.details',compact('pageTitle','detail'));
    }
}
