<?php

namespace App\Http\Livewire\Backend\Report\Visitor;

use App\Services\CountVisitor\CountVisitorService;
use Livewire\Component;

class DataTable extends Component
{
    public $visitors;

    /**
     * Mount function for the ReportVisitorComponent.
     * @param CountVisitorService $countVisitorService The service used to fetch visitor data.
     * @param OrderService $orderService The service used to fetch order data.
     */
    public function mount(CountVisitorService $countVisitorService)
    {
        $this->visitors = $countVisitorService->getAllData();
    }

    /**
     * Render function for the ReportVisitorComponent.
     * @return \Illuminate\View\View The view that should be rendered.
     */
    public function render()
    {
        return view('livewire.backend.report.visitor.data-table');
    }

    /**
     * Function to get the browser name from the user agent.
     * @param string $userAgent The user agent string.
     * @return string The browser name.
     */
    public function getBrowser($userAgent)
    {
        if (strpos($userAgent, 'Opera') !== false || strpos($userAgent, 'OPR') !== false) {
            return 'Opera';
        } elseif (strpos($userAgent, 'Edge') !== false) {
            return 'Edge';
        } elseif (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Safari') !== false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident/7') !== false) {
            return 'Internet Explorer';
        }

        return 'Other';
    }

}
