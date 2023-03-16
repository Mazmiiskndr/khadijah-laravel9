<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.product.index');
    }

    /**
     * DataTable
     */
    public function datatable()
    {
        return view('backend.product.datatable');
    }

    /**
     * Gallery
     */
    public function gallery()
    {
        return view('backend.product.gallery');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        // $product = Product::with('images')->find($id);
        $product = $this->productService->getProductById($id);
        $productTags = $product->tags;
        $productImages = $product->images;
        return view('backend.product.show', compact('product'));
    }

    /**
     * Create
     */
    // public function create()
    // {
    //     return view('backend.product.create');
    // }

}
