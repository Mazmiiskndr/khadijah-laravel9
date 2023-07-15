<?php

namespace App\Http\Livewire\Backend\Dashboard;

use App\Services\Order\OrderService;
use Livewire\Component;

class ChartIncome extends Component
{
    public $totalIncome;

    /**
     * Mount function for the DashboardComponent.
     * @param OrderService $orderService The service used to fetch order data.
     */
    public function mount(OrderService $orderService)
    {
        $this->totalIncome = $orderService->countTotalIncome();
    }

    /**
     * Render function for the DashboardComponent.
     * @return \Illuminate\View\View The view that should be rendered.
     */
    public function render()
    {
        return view('livewire.backend.dashboard.chart-income');
    }
}
