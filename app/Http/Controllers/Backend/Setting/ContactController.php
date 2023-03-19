<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // View Index
    public function index()
    {
        return view('backend.setting.contact.index');
    }
}
