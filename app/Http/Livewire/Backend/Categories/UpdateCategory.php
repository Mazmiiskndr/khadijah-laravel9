<?php

namespace App\Http\Livewire\Backend\Categories;

use App\Models\Category;
use Livewire\Component;

class UpdateCategory extends Component
{
    public  $category_id, $category_name, $category_description, $updateModal = false;
    protected $rules = [
        'category_name' => 'required',
        'category_description' => 'nullable',
    ];
    protected $messages = [
        'category_name.required' => 'Nama Kategori harus diisi!',
    ];
    protected $listeners = [
        'updatedCategory' => '$refresh',
        'getCategory' => 'show'
    ];

    public function render()
    {
        return view('livewire.backend.categories.update-category');
    }

    /**
     * show
     *
     * @param  mixed $category
     * @return void
     */
    public function show($category)
    {
        $this->updateModal = true;
        $this->category_id = $category['category_id'];
        $this->category_name = $category['category_name'];
        $this->category_description = $category['category_description'];
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        // buatkan validate dengan message error harus diisi
        $this->validate();
        if($this->category_id){
            $category = Category::find($this->category_id);
            $category->update([
                'category_name' => $this->category_name,
                'category_description' => $this->category_description,
            ]);
            $this->updateModal = false;
            // Set Flash Message
            session()->flash('success', 'Kategori Berhasil di Update!');
            $this->resetFields();
            // $this->emit('updatedCategory');
            // buatkan emit dengan flash message
            $this->emit('updatedCategory', $category);
            $this->dispatchBrowserEvent('close-modal');
        }

    }

    /**
     * closeModal
     *
     * @return void
     */
    public function closeModal()
    {
        $this->updateModal = false;
        $this->resetFields();
    }

    /**
     * resetFields
     *
     * @return void
     */
    public function resetFields()
    {
        $this->category_id = '';
        $this->category_name = '';
        $this->category_description = '';
    }
}
