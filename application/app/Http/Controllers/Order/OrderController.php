<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class OrderController extends Controller
{
    public function orderList()
    {
        $pageTitle = "Orders History";
        $orders = Order::where('user_id', auth()->user()->id)
                    ->with('orderItems.products')->orderBy('created_at','desc')
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
        if (isEmpty($request->product_ids)){
            $notify[] = ['error', 'Product has empty'];
            return back()->withNotify($notify);
        }

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
        $order->payment_code = $request->payment_code??$request->code;
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

    public function singleOrder($orderId)
    {
        $pageTitle = 'Single Order';
        $user = auth()->user();
        $order = Order::where('id',$orderId)->with('orderItems.products','user','paymentMethod')->whereHas('user',function ($query)
        use($user){
            $query->where('id',$user->id);
        })->first();

//        $user = auth()->user();

        return view($this->activeTemplate.'user.order.singleOrder',compact('pageTitle','order'));
    }

}
