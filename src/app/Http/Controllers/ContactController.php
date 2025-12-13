<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', ['categories' => $categories]);
    }
    
    public function confirm(Request $request)
    {
        $form = $request->only(['name', 'email', 'content', 'category_id']);
        $category = Category::find($form['category_id']);
        return view('confirm', ['form' => $form, 'category' => $category]);
    }

    public function thanks(Request $request)
    {
    $form = $request->all();
    $contact = Contact::create($form);
    return view('thanks');
    }
}