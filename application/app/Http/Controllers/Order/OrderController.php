<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderList()
    {
        $pageTitle = "My Orders";
        return view($this->activeTemplate.'user.order.orderList',compact('pageTitle'));
    }
}
