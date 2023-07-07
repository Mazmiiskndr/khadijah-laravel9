<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Livewire\Component;

class Rating extends Component
{
    public $rating = 0;

    protected $rules = [
        'rating' => 'required|numeric|min:1|max:5',
    ];

    protected $messages = [
        'rating.required' => 'Rating tidak boleh kosong.',
        'rating.numeric' => 'Rating harus berupa angka.',
        'rating.min' => 'Rating tidak boleh kosong.',
        'rating.max' => 'Rating maksimal adalah 5.',
    ];

    public function setRating($rating)
    {
        $this->rating = $rating;
        $this->validateOnly('rating');
    }


    /**
     * Handle updated property.
     * @param string $property
     */
    public function updated($property)
    {
        // Validate only the updated property
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.frontend.checkout.rating');
    }

    public function storeRating()
    {
        $this->validate();
        dd($this->rating);
    }

    /**
     * Closes the rating modal by dispatching a browser event.
     * @return void
     */
    public function closeRatingModal()
    {
        // Dispatch a browser event to close the modal
        $this->dispatchBrowserEvent('close-modal');
    }
}
