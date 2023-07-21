<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Product;
use App\Models\Review;
use Livewire\Component;

class Rating extends Component
{
    public $rating = 0;
    public $comment,$subject, $product_uid, $customer_id;

    protected $listeners = [
        'ratingModal' => 'showModal',
        'ratingCreated' => '$refresh',
    ];

    protected $rules = [
        'subject' => 'required|string',
        'comment' => 'required|string',
        'rating' => 'required|numeric|min:1|max:5',
        'rating' => 'required|numeric|min:1|max:5',
    ];

    protected $messages = [
        'subject.required' => 'Judul tidak boleh kosong.',
        'comment.required' => 'Komentar tidak boleh kosong.',
        'rating.required' => 'Rating tidak boleh kosong.',
        'rating.numeric' => 'Rating harus berupa angka.',
        'rating.min' => 'Rating tidak boleh kosong.',
        'rating.max' => 'Rating maksimal adalah 5.',
    ];

    /**
     * Sets the rating.
     *
     * @param int $rating The rating given by the user.
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
        $this->validateOnly('rating');
    }

    /**
     * Validates a property.
     *
     * @param string $property The name of the property to validate.
     */
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    /**
     * Renders the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.frontend.checkout.rating');
    }

    /**
     * Stores a rating.
     */
    public function storeRating()
    {
        $this->validate();

        try {
            $product = Product::select('product_uid', 'product_id')->where('product_uid', $this->product_uid)->first();
            // Create a new review
            $review = Review::create([
                'product_id' => $product->product_id,
                'customer_id' => $this->customer_id,
                'subject' => $this->subject,
                'comment' => $this->comment,
                'rating' => $this->rating,
                'review_date' => now(),
            ]);

            // Emit 'ratingCreated' event with the created product
            $this->emit('ratingCreated', $review);

            // Show a success message
            session()->flash('success', 'Terima Kasih telah memberikan Penilaian.');
        } catch (\Throwable $th) {
            // Show an error message
            session()->flash('error', 'Terjadi kesalahan saat menambahkan penilain.' . $th->getMessage());
        } finally {
            // Close the modal
            $this->closeRatingModal();
        }
    }

    /**
     * Shows the rating modal.
     *
     * @param string $product_uid The unique identifier of the product being reviewed.
     */
    public function showModal($product_uid)
    {
        $this->product_uid = $product_uid;
        $this->dispatchBrowserEvent('show-rating-modal');
    }

    /**
     * Reset form fields.
     */
    public function resetFields()
    {
        $this->comment = null;
        $this->subject = null;
        $this->rating = 0;
    }

    /**
     * Closes the rating modal.
     */
    public function closeRatingModal()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
        // Reset the validation error messages
        $this->resetErrorBag();
        // Reset the validation status
        $this->resetValidation();
    }
}
