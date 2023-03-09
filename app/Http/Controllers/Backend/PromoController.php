<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Promo\PromoService;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    private $PromoService;
    /**
     * __construct
     *
     * @param  mixed $PromoService
     * @return void
     */
    public function __construct(PromoService $PromoService)
    {
        $this->PromoService = $PromoService;
    }


    public function index()
    {
        return view('backend.promo.index');
    }
}
