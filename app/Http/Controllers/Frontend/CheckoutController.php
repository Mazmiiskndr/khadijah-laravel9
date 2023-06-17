<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('frontend.checkout.index');
    }

    public function show($orderUid)
    {
        $order = Order::with('orderDetails.product', 'shippingDetail')->where('order_uid', $orderUid)->get();
        return view('frontend.checkout.order-success');
    }
}
