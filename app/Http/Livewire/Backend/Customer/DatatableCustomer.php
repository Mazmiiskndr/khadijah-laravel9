<?php

namespace App\Http\Livewire\Backend\Customer;

use App\Models\Customer;
use App\Services\Customer\CustomerService;
use Livewire\Component;

class DatatableCustomer extends Component
{
    public $customer_uid, $customer;
    protected $listeners = [
        'customerCreated' => 'handleStored',
        'updatedCustomer' => 'handleUpdated',
        'deleteConfirmation' => 'destroy',
    ];
    public function render(CustomerService $customerService)
    {

        return view('livewire.backend.customer.datatable-customer', [
            'customers' => $customerService->getAllData(),
        ]);
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
     * deleteConfirmation
     *
     * @param  mixed $customer_uid
     * @return void
     */
    public function deleteConfirmation($customer_uid)
    {
        $this->customer_uid  = $customer_uid;
        $this->dispatchBrowserEvent('delete-show-confirmation');
    }

    /**
     * destroy
     *
     * @param  mixed $customer_uid
     * @return void
     */
    public function destroy()
    {
        $customer = Customer::where('customer_uid', $this->customer_uid)->firstOrFail();
        $customer->delete();
        // Set Flash Message
        session()->flash('success', 'Customer Berhasil di Hapus!');
    }

    /**
     * handleStored
     *
     * @return void
     */
    public function handleStored()
    {
        //
    }

    /**
     * handleUpdated
     *
     * @return void
     */
    public function handleUpdated()
    {
        //
    }
}
