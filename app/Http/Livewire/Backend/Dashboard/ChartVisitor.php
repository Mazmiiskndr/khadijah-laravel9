<?php

namespace App\Http\Livewire\Backend\Dashboard;

use App\Services\CountVisitor\CountVisitorService;
use Livewire\Component;

class ChartVisitor extends Component
{
    public $visitors;

    /**
     * Mount function for the DashboardComponent.
     * @param CountVisitorService $countVisitorService The service used to fetch visitor data.
     * @param OrderService $orderService The service used to fetch order data.
     */
    public function mount(CountVisitorService $countVisitorService)
    {
        $this->visitors = $countVisitorService->getAllData();
    }

    /**
     * Render function for the DashboardComponent.
     * @return \Illuminate\View\View The view that should be rendered.
     */
    public function render()
    {
        return view('livewire.backend.dashboard.chart-visitor');
    }
}
