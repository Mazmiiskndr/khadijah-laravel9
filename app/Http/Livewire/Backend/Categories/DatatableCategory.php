<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use App\Services\Category\CategoryService;
use Livewire\Component;

class DatatableCategory extends Component
{
    public $category;
    public $category_id;

    protected $listeners = [
        'createdCategory' => 'handleStored',
        'updatedCategory' => 'handleUpdated',
        'deleteConfirmation' => 'destroy',
    ];

    public function render(CategoryService $categoryService)
    {
        return view('livewire.backend.categories.datatable-category',[
            'categories' => $categoryService->getAllData(),
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
     * deleteConfirmation
     *
     * @param  mixed $category_id
     * @return void
     */
    public function deleteConfirmation($category_id)
    {
        // $category = Category::find($category_id);
        $this->category_id  = $category_id;
        $this->dispatchBrowserEvent('delete-show-confirmation');
        // $this->emit('deleteConfirmation', $category);
    }

    /**
     * destroy
     *
     * @param  mixed $category_id
     * @return void
     */
    public function destroy()
    {
        $category = Category::where('category_id', $this->category_id)->first();
        $category->delete();
        // Set Flash Message
        session()->flash('success', 'Kategori Berhasil di Hapus!');
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
        //
    }


}
