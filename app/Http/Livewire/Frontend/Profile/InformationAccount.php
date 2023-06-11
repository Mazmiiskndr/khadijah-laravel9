<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Customer;
use App\Services\Customer\CustomerService;
use Livewire\Component;

class InformationAccount extends Component
{
    public $customer, $addressCustomer, $provinceCustomer, $cityCustomer;
    protected $listeners = [
        'updatedCustomer' => 'handleUpdated',
        'updatedCustomerAddress' => 'handleAddressUpdated',
    ];

    /**
     * Called when the component is initialized. Sets the initial values for the customer's address,
     * province, and city. If these values do not exist on the customer object, they are set to "-".
     */
    public function mount()
    {
        $this->addressCustomer = $this->customer->address ? $this->customer->address : "-";
        $this->provinceCustomer = $this->customer->province_id ? ucwords(strtolower($this->customer->provinceAndCity['province'])) : "-";
        $this->cityCustomer = $this->customer->city_id ? ucwords(strtolower($this->customer->provinceAndCity['city_name'])) : "-";
    }

    /**
     * Renders the Livewire view for this component.
     * @return \Illuminate\View\View The view to be rendered.
     */
    public function render()
    {
        return view('livewire.frontend.profile.information-account');
    }

    /**
     * Fetches a customer's data based on their UID and emits an event with this data.
     * @param  string $customer_uid The UID of the customer to fetch data for.
     */
    public function getCustomer($customer_uid)
    {
        $customerService = app(\App\Services\Customer\CustomerService::class);
        $customerData = $customerService->findByUid($customer_uid);
        $this->emit('getCustomer', $customerData);
    }

    /**
     * Handler function for the 'updatedCustomer' event.
     */
    public function handleUpdated()
    {
        // Implement what should happen when the customer data is updated
    }

    /**
     * Handler function for the 'updatedCustomerAddress' event.
     */
    public function handleAddressUpdated()
    {
        // Implement what should happen when the customer address is updated
    }
}
