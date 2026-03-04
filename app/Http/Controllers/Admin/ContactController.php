<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['status' => 1]); // Mark as read
        return view('admin.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->route('admin.contact.index')->with('success', 'Xóa thành công!');
    }
}
