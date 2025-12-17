<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin.contacts.index', ['contacts' => $contacts]);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.contacts.show', ['contact' => $contact]);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->status = $request->status;
        $contact->save();
        return redirect("/admin/contacts");
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect("/admin/contacts");
    }

}
