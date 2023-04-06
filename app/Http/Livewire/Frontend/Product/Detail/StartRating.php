<?php

namespace App\Http\Livewire\Frontend\Product\Detail;

use Livewire\Component;

class StartRating extends Component
{
    public $rating = 0;

    public function setRating($rating)
    {
        $this->rating = $rating;
        // Logika untuk menyimpan rating ke database

        // Contoh: Anda mungkin perlu menyimpan rating ke model Review atau tabel terkait
        // Review::create(['rating' => $this->rating, ...]);
    }
    public function render()
    {
        return view('livewire.frontend.product.detail.start-rating');
    }
}
