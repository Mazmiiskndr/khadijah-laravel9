<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $productService;
    /**
     * __construct
     *
     * @param  mixed $productService
     * @return void
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * index
     */
    public function index()
    {
        return view('frontend.product.index');
    }


    /**
     * Show Detail Product
     * @param  mixed $slug
     */
    public function show($slug)
    {
        $product = $this->productService->getProductBySlug($slug);

        // Retrieve the new products with their average ratings
        $newProducts1 = Product::with('images')->orderBy('created_at', 'DESC')->offset(1 - 1)->limit(3)->get()->each(function ($product) {
            $product->averageRating = $product->averageRating();
        });

        $newProducts2 = Product::with('images')->orderBy('created_at', 'DESC')->offset(4 - 1)->limit(3)->get()->each(function ($product) {
            $product->averageRating = $product->averageRating();
        });

        return view('frontend.product.show', [
            'product' => $product,
            'newProducts1' => $newProducts1,
            'newProducts2' => $newProducts2,
        ]);
    }

}
