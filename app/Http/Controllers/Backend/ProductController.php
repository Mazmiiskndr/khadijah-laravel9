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
    public function show($uid)
    {

        $product = Product::with('images', 'category', 'tags')->where('product_uid', $uid)->first();

        // $product = $this->productService->getProductById($uid);
        // dd($product);
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
