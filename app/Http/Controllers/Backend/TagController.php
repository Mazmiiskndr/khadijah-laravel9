<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // View Index
    public function index()
    {
        return view('backend.tags.index');
    }
}
