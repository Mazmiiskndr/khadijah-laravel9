<?php

namespace App\Http\Livewire\Backend\Customer;

use App\Services\Customer\CustomerService;
use Livewire\Component;

class DatatableCustomer extends Component
{
    public function render(CustomerService $customerService)
    {
        return view('livewire.backend.customer.datatable-customer', [
            'customers' => $customerService->getAllData(),
        ]);
    }
}
