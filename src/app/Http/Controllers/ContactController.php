<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', ['categories' => $categories]);
    }
    
    public function confirm(ContactRequest $request)
    {
        $form = $request->only(['name', 'email', 'content', 'category_id']);
        $category = Category::find($form['category_id']);
        return view('confirm', ['form' => $form, 'category' => $category]);
    }

    public function thanks(ContactRequest $request)
    {
    $form = $request->all();
    $contact = Contact::create($form);
    return view('thanks');
    }

    public function edit(Request $request)
    {
    return redirect('/')->withInput();   
    }
}