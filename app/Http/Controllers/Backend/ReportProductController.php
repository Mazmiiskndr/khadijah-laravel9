<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\ReportProduct\ReportProductService;
use Illuminate\Http\Request;

class ReportProductController extends Controller
{
    private $reportProductService;
    /**
     * __construct
     *
     * @param  mixed $reportProductService
     * @return void
     */
    public function __construct(ReportProductService $reportProductService)
    {
        $this->reportProductService = $reportProductService;
    }


    public function index()
    {
        return view('backend.report.product.index');
    }
}
