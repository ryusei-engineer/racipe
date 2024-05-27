<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function admin1016(){
        $contacts = Contact::all();
        return view('admin1016', compact('contacts'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
        ]);
        Contact::create($validated);

        return view('sent');
    }
    
}
