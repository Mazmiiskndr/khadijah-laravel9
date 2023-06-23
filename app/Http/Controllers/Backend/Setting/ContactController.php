<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Render the component index `contact`.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.setting.contact.index');
    }
}
