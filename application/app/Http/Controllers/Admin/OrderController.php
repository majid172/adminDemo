<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    {
        $pageTitle = "Order List";
        $orders = Order::with(['orderItems.products','user'])->paginate(getPaginate(15));
        return view('admin.orders.list',compact('pageTitle','orders'));
    }
}
