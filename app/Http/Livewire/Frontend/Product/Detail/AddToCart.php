<?php

namespace App\Http\Livewire\Frontend\Product\Detail;

use Livewire\Component;

class AddToCart extends Component
{
    public $productColors, $productSize, $selectedColor, $selectedSize, $quantity = 1, $productUid;

    protected $listeners = [
        'productSelectedColor' => 'onProductSelectedColor',
        'productSelectedSize' => 'onProductSelectedSize',
        'productSelectedQuantity' => 'onProductSelectedQuantity',
    ];

    protected $rules = [
        'selectedSize' => 'required',
        'selectedColor' => 'required',
    ];
    protected $messages = [
        'selectedSize.required' => 'Ukuran harus dipilih!',
        'selectedColor.required' => 'Ukuran harus dipilih!',
    ];

    public function render()
    {
        $colors = explode(', ', $this->productColors);
        $sizes = explode(', ', $this->productSize);
        return view('livewire.frontend.product.detail.add-to-cart', [
            'sizes' => $sizes,
            'colors' => $colors,
            'productUid' => $this->productUid,
            'selectedColor' => $this->selectedColor,
            'selectedSize' => $this->selectedSize,
            'quantity' => $this->quantity,
        ]);
    }

    public function onProductSelectedColor($color)
    {
        $this->selectedColor = $color;
    }

    public function onProductSelectedSize($size)
    {
        $this->selectedSize = $size;
    }
    // TODO:
    public function addToCart($productUid)
    {
        $this->validate();
        $data = [
            'product_uid' => $productUid,
            'color' => $this->selectedColor,
            'size' => $this->selectedSize,
            'quantity' => $this->quantity,
        ];
        dd($data);
        // TODO: Implement add to cart functionality
    }
}
