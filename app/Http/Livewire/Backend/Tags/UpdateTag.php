<?php

namespace App\Http\Livewire\Backend\Tags;

use App\Models\Tag;
use Livewire\Component;

class UpdateTag extends Component
{

    public  $tag_id, $tag_name, $tag_description, $updateModal = false;
    protected $rules = [
        'tag_name' => 'required',
        'tag_description' => 'nullable',
    ];
    protected $messages = [
        'tag_name.required' => 'Nama Label harus diisi!',
    ];
    protected $listeners = [
        'updatedTag' => '$refresh',
        'getTag' => 'show'
    ];


    public function render()
    {
        return view('livewire.backend.tags.update-tag');
    }

    /**
     * show
     *
     * @param  mixed $tag
     * @return void
     */
    public function show($tag)
    {
        $this->updateModal = true;
        $this->tag_id = $tag['tag_id'];
        $this->tag_name = $tag['tag_name'];
        $this->tag_description = $tag['tag_description'];
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
        if ($this->tag_id) {
            $tag = Tag::find($this->tag_id);
            $tag->update([
                'tag_name' => $this->tag_name,
                'tag_description' => $this->tag_description,
            ]);
            $this->updateModal = false;
            // Set Flash Message
            session()->flash('success', 'Label Berhasil di Update!');
            $this->resetFields();
            // $this->emit('updatedTag');
            // buatkan emit dengan flash message
            $this->emit('updatedTag', $tag);
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
        $this->tag_id = '';
        $this->tag_name = '';
        $this->tag_description = '';
    }
}
