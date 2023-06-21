<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Render the component index `bank`.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.setting.bank.index');
    }
}
