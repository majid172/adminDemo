<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderList()
    {
        $pageTitle = "My Orders";
        $orders = Order::where('user_id', auth()->user()->id)
                    ->with('orderItems.products')
                    ->get();
        return view($this->activeTemplate.'user.order.orderList',compact('pageTitle','orders'));
    }
    public function orderStore(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
//            'product_ids' => 'required|array',
//            'product_ids.*' => 'exists:products,id'
        ]);

        $user = auth()->user();
        $order = new Order();
        $order->order_no = '#'.now()->format('y').now()->format('m').now()->format('d').auth()->user()->id.rand(11,99);
        $order->user_id = $user->id;
        $order->total_amount = $request->amount;
        $order->shipping_address = json_encode([
            'address' => $user->address->address,
            'zip' => $user->address->zip,
            'city' => $user->address->city,
            'state' => $user->address->state,
            'country' => $user->address->country
        ]);
        $order->status = 1;
        $order->delivery_ins = $request->delivery_ins;
        $order->save();

        $this->orderItems($request->product_ids, $user->id, $order->id);
        $this->removeCart($request->product_ids,$user->id);

        $notify[] = ['success', 'Order stored successfully.'];
        return back()->withNotify($notify);
    }

    public function orderItems($product_ids, $user_id, $order_id)
    {

        foreach ($product_ids as $product_id) {
            $cart = Cart::where(['user_id' => $user_id, 'product_id' => $product_id])->with('products')->first();

            if ($cart) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order_id;
                $orderItem->product_id = $product_id;
                $orderItem->quantity = $cart->quantity;
                $orderItem->price = $cart->products->price;
                $orderItem->save();
            }
        }
    }

    public function removeCart($product_ids,$user_id)
    {
        foreach ($product_ids as $product_id) {
            $cart = Cart::where(['user_id' => $user_id, 'product_id' => $product_id])->with('products')->first();
            $cart->delete();
        }
    }

    public function singleOrder()
    {
        return view($this->activeTemplate.'user.order.singleOrder');
    }

}
