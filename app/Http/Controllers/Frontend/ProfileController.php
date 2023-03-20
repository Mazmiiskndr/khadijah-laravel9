<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::guard('customer')->check() == false){
            return redirect()->route('customer.login');
        }else{
            $customer = $this->customerService->findByUid($uid);
            $addressCustomer = $customer->address ? $customer->address : "-";
            $provinceCustomer = $customer->province ? ucwords(strtolower($customer->province->name)) : "-";
            $cityCustomer = $customer->city ? ucwords(strtolower($customer->city->name)) : "-";
            $districtCustomer = $customer->district ? ucwords(strtolower($customer->district->name)) : "-";
            return view('frontend.profile.index',[
                'customer' => $customer,
                'addressCustomer' => $addressCustomer,
                'provinceCustomer' => $provinceCustomer,
                'cityCustomer' => $cityCustomer,
                'districtCustomer' => $districtCustomer,
            ]);
        }
    }
}
