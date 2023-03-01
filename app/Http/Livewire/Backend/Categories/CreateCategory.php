<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{

    protected $listeners = [
        'createdCategory' => '$refresh',
    ];

    public $category_description;
    public $category_name;
    protected $rules = [
        'category_name' => 'required',
        'category_description' => 'required',
    ];
    protected $messages = [
        'category_name.required' => 'Nama Kategori harus diisi!',
        'category_description.required' => 'Deskripsi harus diisi!',
    ];

    /**
     * updated
     *
     * @param  mixed $property
     * @return void
     */
    public function updated($property)
    {
        // Every time a property changes
        // (only `text` for now), validate it
        $this->validateOnly($property);
    }

    /**
     * store
     *
     * @return void
     */
    public function store()
    {

        // Validate Form Request
        $this->validate();

        try {
            // Create Category
            $category = Category::create([
                'category_name' => $this->category_name,
                'category_description' => $this->category_description
            ]);

            // Set Flash Message
            session()->flash('success', 'Kategori Berhasil di Tambahkan!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
            $this->emit('createdCategory', $category);
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error', 'Kategori Gagal di Tambahkan!');

            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
    }

    /**
     * resetFields
     *
     * @return void
     */
    public function resetFields()
    {
        $this->category_name = '';
        $this->category_description = '';
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.backend.categories.create-category');
    }
}
