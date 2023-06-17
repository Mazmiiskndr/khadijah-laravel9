<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Services\Order\OrderService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListTransaction extends Component
{
    // Public property to store the order detail data
    public $orders;

    /**
     * Mount the component.
     * @param OrderService $orderService OrderService instance (injected automatically by Laravel)
     */
    public function mount(OrderService $orderService)
    {
        // Get the authenticated user's ID
        $customerId = Auth::guard('customer')->user()->id;
        $this->orders = $orderService->getOrderDetailsByCustomerId($customerId);
    }

    /**
     * Render the component.
     * This method returns the view which will be rendered for this component.
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        // If the order details is empty, then show the flash message
        if (count($this->orders) == 0) {
            session()->flash('message', 'Sepertinya Anda belum memiliki transaksi apapun. Ayo mulai berbelanja dan temukan penawaran menarik!');
        }

        return view('livewire.frontend.profile.list-transaction');
    }
}
