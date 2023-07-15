<?php

namespace App\Http\Livewire\Backend\Report\Product;

use App\Services\Order\OrderService;
use Livewire\Component;

class DataTable extends Component
{

    public $products;

    /**
     * Mount function for the ReportProductComponent.
     * @param OrderService $orderService The service used to fetch order data.
     */
    public function mount(OrderService $orderService)
    {
        $this->products = $orderService->getProductSales();
    }

    /**
     * Render function for the ReportProductComponent.
     * @return \Illuminate\View\View The view that should be rendered.
     */
    public function render()
    {
        return view('livewire.backend.report.product.data-table');
    }
}
