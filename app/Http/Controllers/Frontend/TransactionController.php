<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use ReflectionClass;

class TransactionController extends Controller
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
     * Display the specified order.
     * @param  string  $orderUid
     * @return \Illuminate\View\View
     */
    public function show($orderUid)
    {
        // Returning the view with the order data.
        return view('frontend.transaction.detail', compact('orderUid'));
    }

    /**
     * Display the specified Invoice.
     * @param  string  $orderUid
     * @return \Illuminate\View\View
     */
    public function invoice($orderUid)
    {
        // Returning the view with the order data.
        return view('frontend.invoice.index', compact('orderUid'));
    }
}
