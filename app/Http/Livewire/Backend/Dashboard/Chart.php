<?php

namespace App\Http\Livewire\Backend\Dashboard;

use App\Services\CountVisitor\CountVisitorService;
use Livewire\Component;

class Chart extends Component
{

    public function render(CountVisitorService $countVisitorService)
    {
        return view('livewire.backend.dashboard.chart', [
            'visitors' => $countVisitorService->getAllData(),
        ]);
    }
}
