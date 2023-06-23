<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * The order service instance.
     */
    protected $orderService;

    /**
     * Create a new controller instance.
     * @param  \App\Services\OrderService  $orderService
     * @return void
     */
    public function __construct(OrderService $orderService)
    {
        // Assigning the received OrderService object to $this->orderService
        $this->orderService = $orderService;
    }

    /**
     * Display the checkout page.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.checkout.index');
    }

    /**
     * Display the specified order.
     * @param  string  $orderUid
     * @return \Illuminate\View\View
     */
    public function show($orderUid)
    {

        // Returning the view with the order data.
        return view('frontend.checkout.order-success', compact('orderUid'));
    }
}
