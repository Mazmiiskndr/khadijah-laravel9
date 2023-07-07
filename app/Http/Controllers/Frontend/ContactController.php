<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Display the contact page.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve contact data with its associated province, city, and district
        $contact = Contact::first();
        return view('frontend.contact.index',compact('contact'));
    }

}
