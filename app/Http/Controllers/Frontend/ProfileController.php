<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;

class ProfileController extends Controller
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

    public function show($uid)
    {
        $customer = $this->customerService->findByUid($uid);
        return view('frontend.profile.index',compact('customer'));
    }
}
