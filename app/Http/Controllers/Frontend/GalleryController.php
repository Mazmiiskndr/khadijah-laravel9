<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class GalleryController extends Controller
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


    public function index()
    {
        $products = $this->productService->getAllData();
        return view('frontend.gallery.index',compact('products'));
    }
}
