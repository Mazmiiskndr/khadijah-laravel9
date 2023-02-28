<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    private $categoryService;
    /**
     * __construct
     *
     * @param  mixed $categoryService
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->categoryService->getAllData();
        return view('backend.categories.index',['data', $data]);
    }
    public function datatables()
    {
        $data = $this->categoryService->getAllData();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('description_short', function ($row) {
            return substr($row->category_description, 0, 50) . '...';
        })
        ->addColumn('action', function ($row) {

            return '<a href="javascript:void(0);" class="btn btn-pill btn-sm btn-primary"><i class="fa fa-lg fa-edit"></i></a>' .
            '<a href="javascript:void(0);" class="btn btn-pill btn-sm btn-danger" style="margin-left:5px;"><i class="fa fa-lg fa-trash"></i></a>';
        })
        ->rawColumns(['description_short', 'action'])
        ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
