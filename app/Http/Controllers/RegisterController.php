<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
       $validatedData=$request->validate([
        'username' => 'required|max:24|min:3',
        'email' => 'required|email:dns|unique:users|max:255',
        'password' => 'required|max:255|min:6'
       ]);

       User::create($validatedData);
       $request->session()->flash('success', 'Register done! Please login');
       return redirect('/login');

    }
}
