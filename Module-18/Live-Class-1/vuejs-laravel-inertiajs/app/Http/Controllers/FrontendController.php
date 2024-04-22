<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }

    public function user()
    {
        $users = User::all();
        return Inertia::render('User', ['users' => $users]);
    }

    public function about()
    {
        $about = [
            'name' => 'Inertia.js',
            'description' => 'Inertia.js lets you quickly build modern single-page React, Vue and Svelte apps using classic server-side routing and controllers.'
        ];
        return Inertia::render('About', ['about' => $about]);
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        return redirect()->intended('/contact')->with('message', 'Message sent successfully!');
    }
}
