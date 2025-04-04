<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/admin/contact', [
            'contact'=>Contact::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/admin/contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:dns',
            'phone' => 'required|min:10',
        ]);
        Contact::create($validatedData);
        return redirect('/dashboard/admin/contact')->with('success', 'New contact has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('dashboard/admin/contact', [
            'contact' => Contact::all(),
            'editContact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);
        
        $validatedData = $request->validate([
            'email' => 'required|email:dns',
            'phone' => 'required|min:10',
        ]);

        $contact->update($validatedData);
        
        return redirect('/dashboard/admin/contact')->with('success', 'Contact has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        
        return redirect('/dashboard/admin/contact')->with('success', 'Contact has been deleted!');
    }
}
