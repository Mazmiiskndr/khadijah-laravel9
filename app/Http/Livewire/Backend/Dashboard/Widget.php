<?php

namespace App\Http\Livewire\Backend\Dashboard;

use App\Models\Product;
use App\Services\Order\OrderService;
use Livewire\Component;

class Widget extends Component
{

    /**
     * Render the component `widget in dashboard`.
     * @param OrderService $orderService - The order service
     * @return \Illuminate\Contracts\View\View
     */
    public function render(OrderService $orderService)
    {
        $totalProducts = Product::count();
        $totalOrders = $orderService->countCompletedOrders();
        return view('livewire.backend.dashboard.widget', [
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
        ]);
    }
}
