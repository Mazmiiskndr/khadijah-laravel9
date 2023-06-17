<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Services\Order\OrderService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardAccount extends Component
{
    // Public property to store the customer data
    public $customer, $totalOrder = 0, $totalPendingOrder = 0;

    // Listeners for the Livewire events
    protected $listeners = [
        'updatedCustomer' => 'handleUpdated',
    ];

    /**
     * Mount the component.
     * @param OrderService $orderService OrderService instance (injected automatically by Laravel)
     */
    public function mount(OrderService $orderService)
    {
        // Get the authenticated user's ID
        $customerId = Auth::guard('customer')->user()->id;

        // Use the OrderService to count the total orders made by the user id
        $this->totalOrder = $orderService->countTotalOrdersByCustomerId($customerId);
        // Use the OrderService to count the total pending orders made by the user id
        $this->totalPendingOrder = $orderService->countPendingOrdersByCustomerId($customerId);
        dd($this->totalPendingOrder);
    }

    /**
     * Render the component.
     * This method returns the view which will be rendered for this component.
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.frontend.profile.dashboard-account');
    }

    /**
     * This method is called when the 'updatedCustomer' event is fired.
     * @return void
     */
    public function handleUpdated()
    {
        // code..
    }
}
