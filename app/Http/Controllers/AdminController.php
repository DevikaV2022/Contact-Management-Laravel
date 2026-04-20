<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\Contact;

class AdminController extends Controller
{
    
  public function dashboard(){
    $acceptedCount = Contact::where('status', 'Accepted')->count();
    $newRequests = Contact::where('status', 'New')->count();
    $contacts = Contact::latest()->get();

    return view('admin.dashboard', compact('acceptedCount', 'newRequests', 'contacts'));
  }

  public function manageContact(Request $req){
    $status = $req->status;
    $search = $req->search;

    $query = Contact::query();

    // FILTER
    if ($status && $status != 'All') {
        $query->where('status', $status);
    }

    // SEARCH
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%");
        });
    }

    $contacts = $query->latest()->get();

    return view('admin.manage-contact', compact('contacts'));
  }

  public function accept($id){
    Contact::find($id)->update(['status' => 'Accepted']);
    return back();
  }

  public function reject($id){
    Contact::find($id)->update(['status' => 'Rejected']);
    return back();
  }

  public function contactList() {
    $contacts = Contact::latest()->get();
    return view('admin.contact-list', compact('contacts'));
  }

  public function delete($id) {
    Contact::find($id)->delete();
    return back();
  }

  
}
