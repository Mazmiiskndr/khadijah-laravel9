<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Promo\PromoService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    private $promoService;
    /**
     * __construct
     *
     * @param  mixed $promoService
     * @return void
     */
    public function __construct(PromoService $promoService)
    {
        $this->promoService = $promoService;
    }


    public function index()
    {
        return view('backend.promo.index');
    }
}
