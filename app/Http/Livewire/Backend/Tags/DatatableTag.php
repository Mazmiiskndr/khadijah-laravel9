<?php

namespace App\Http\Livewire\Backend\Tags;

use App\Models\Tag;
use App\Services\Tag\TagService;
use Livewire\Component;

class DatatableTag extends Component
{
    public $tag;
    public $tag_id;

    protected $listeners = [
        'createdTag' => 'handleStored',
        'updatedTag' => 'handleUpdated',
        'deleteConfirmation' => 'destroy',
    ];



    public function render(TagService $tagService)
    {
        return view('livewire.backend.tags.datatable-tag', [
            'tags' => $tagService->getAllData(),
        ]);
    }

    /**
     * getTag
     *
     * @param  mixed $tag_id
     * @return void
     */
    public function getTag($tag_id)
    {
        $tag = Tag::find($tag_id);
        $this->emit('getTag', $tag);
    }

    /**
     * deleteConfirmation
     *
     * @param  mixed $tag_id
     * @return void
     */
    public function deleteConfirmation($tag_id)
    {
        $this->tag_id  = $tag_id;
        $this->dispatchBrowserEvent('delete-show-confirmation');
    }

    /**
     * destroy
     *
     * @param  mixed $tag_id
     * @return void
     */
    public function destroy()
    {
        $tag = Tag::where('tag_id', $this->tag_id)->first();
        $tag->delete();
        // Set Flash Message
        session()->flash('success', 'Label Berhasil di Hapus!');
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
