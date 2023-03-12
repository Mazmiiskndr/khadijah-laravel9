<?php

namespace App\Http\Livewire\Backend\Tags;

use App\Models\Tag;
use Livewire\Component;

class CreateTag extends Component
{
    public $tag_description, $tag_name;
    protected $listeners = [
        'createdTag' => '$refresh',
    ];
    protected $rules = [
        'tag_name' => 'required',
        'tag_description' => 'nullable',
    ];
    protected $messages = [
        'tag_name.required' => 'Nama Label harus diisi!',
    ];

    public function render()
    {
        return view('livewire.backend.tags.create-tag');
    }

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
            // Create Tag
            $tag = Tag::create([
                'tag_name'          => $this->tag_name,
                'tag_description'   => $this->tag_description
            ]);

            // Set Flash Message
            session()->flash('success', 'Label Berhasil di Tambahkan!');

            // Reset Form Fields After Creating Tag
            $this->resetFields();
            $this->emit('createdTag', $tag);
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error', 'Label Gagal di Tambahkan!');

            // Reset Form Fields After Creating Tag
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
        $this->tag_name = '';
        $this->tag_description = '';
    }
}
