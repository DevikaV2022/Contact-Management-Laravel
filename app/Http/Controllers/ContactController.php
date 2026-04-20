<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function store(Request $request){
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        // temporary success (DB save later)
        return back()->with('success', 'Form submitted successfully!');
    }

    public function ContactList(){
        $contacts = Contact::latest()->get();
        return view('admin.contact-list', compact('contacts'));
    }

    public function manageContact(Request $req){
     $query = Contact::query();

     if ($req->status && $req->status != 'All') {
        $query->where('status', $req->status);
     }

     if ($req->search) {
        $query->where('name','like',"%{$req->search}%")
              ->orWhere('email','like',"%{$req->search}%");
     }

     $contacts = $query->latest()->get();

     return view('admin.manage-contact', compact('contacts'));
    }
}
