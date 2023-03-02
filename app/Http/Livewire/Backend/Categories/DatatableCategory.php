<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use Livewire\Component;

class DatatableCategory extends Component
{
     public $category;

    protected $listeners = [
        'createdCategory' => 'handleStored',
        'updatedCategory' => 'handleUpdated',
    ];

    public function render()
    {
        return view('livewire.backend.categories.datatable-category',[
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * getCategory
     *
     * @param  mixed $category_id
     * @return void
     */
    public function getCategory($category_id)
    {
        $category = Category::find($category_id);
        $this->emit('getCategory', $category);
    }

    /**
     * handleStored
     *
     * @return void
     */
    public function handleStored()
    {
        //
    }
    /**
     * handleUpdated
     *
     * @return void
     */
    public function handleUpdated()
    {
        // Set Flash Message
        session()->flash('success', 'Kategori Berhasil di Update!');
    }


}
