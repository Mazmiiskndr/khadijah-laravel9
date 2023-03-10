<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CustomerController extends Controller
{
    private $customerService;
    /**
     * __construct
     *
     * @param  mixed $customerService
     * @return void
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.customer.index');
    }
}
