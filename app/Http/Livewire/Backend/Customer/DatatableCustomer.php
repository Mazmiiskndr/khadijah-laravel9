<?php

namespace App\Http\Livewire\Backend\Customer;

use App\Models\Customer;
use App\Services\Customer\CustomerService;
use Livewire\Component;

class DatatableCustomer extends Component
{
    public $customer_id, $customer;
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
     * getCustomer
     *
     * @param  mixed $customer_id
     * @return void
     */
    public function getCustomer($customer_id)
    {
        $customer = Customer::with('province', 'city', 'district')->find($customer_id);
        $this->emit('getCustomer', $customer);
    }

    /**
     * deleteConfirmation
     *
     * @param  mixed $customer_id
     * @return void
     */
    public function deleteConfirmation($customer_id)
    {
        $this->customer_id  = $customer_id;
        $this->dispatchBrowserEvent('delete-show-confirmation');
    }

    /**
     * destroy
     *
     * @param  mixed $customer_id
     * @return void
     */
    public function destroy()
    {
        $customer = Customer::find($this->customer_id);
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
