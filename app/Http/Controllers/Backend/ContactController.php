<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function ContactManage() {
        $message = Contact::latest()->get();
        return view('backend.contact.contact_manage', compact('message'));
    } // End Method

    public function ContactView($id) {
        $message = Contact::findOrFail($id);
        return view('backend.contact.contact_view', compact('message'));
    } // End Method
}
