<?php

namespace App\Http\Livewire\Backend\Dashboard;

use App\Models\Product;
use Livewire\Component;

class Widget extends Component
{
    public function render()
    {
        $totalProducts = Product::count();
        return view('livewire.backend.dashboard.widget',['totalProducts' => $totalProducts]);
    }
}
