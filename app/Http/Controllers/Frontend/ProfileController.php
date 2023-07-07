<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\ApiRajaOngkir\ApiRajaOngkirService;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $customerService;
    private $apiRajaOngkirService;

    /**
     * __construct
     * @param  mixed $customerService
     * @param  mixed $apiRajaOngkirService
     * @return void
     */
    public function __construct(CustomerService $customerService, ApiRajaOngkirService $apiRajaOngkirService)
    {
        $this->customerService = $customerService;
        $this->apiRajaOngkirService = $apiRajaOngkirService;
    }

    public function show($uid)
    {
        if (Auth::guard('customer')->check() == false) {
            return redirect()->route('customer.login');
        } else {
            $customer = $this->customerService->findByUid($uid);
            $addressCustomer = $customer->address ? $customer->address : "-";
            $provinceCustomer = $customer->province_id ? ucwords(strtolower($customer->province)) : "-";
            $cityCustomer = $customer->city_id ? ucwords(strtolower($customer->city)) : "-";
            $districtCustomer = $customer->district_id ? ucwords(strtolower($customer->district)) : "-";

            return view('frontend.profile.index', [
                'customer' => $customer,
                'addressCustomer' => $addressCustomer,
                'provinceCustomer' => $provinceCustomer,
                'cityCustomer' => $cityCustomer,
                'districtCustomer' => $districtCustomer,
            ]);
        }
    }
}
