<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use Livewire\Component;

class DatatableCategory extends Component
{
    protected $listeners = [
        'createdCategory' => 'handleStored',
    ];

    public function render()
    {
        return view('livewire.backend.categories.datatable-category',[
            'categories' => Category::latest()->get(),
        ]);
    }

    public function handleStored()
    {
        //
    }

}
