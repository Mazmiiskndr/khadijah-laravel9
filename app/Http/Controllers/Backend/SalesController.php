<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Render the component index `sales-index`.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.sales.index');
    }

    public function edit($order_uid)
    {
        return view('backend.sales.edit', compact('order_uid'));
    }
}
