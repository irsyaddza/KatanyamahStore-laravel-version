<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/admin/faq', [
            'faq'=>Faq::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/admin/faq');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|min:5|max:255',
            'answer' => 'required|min:5|max:255',
        ]);
        Faq::create($validatedData);
        return redirect('/dashboard/admin/faq')->with('success', 'New faq has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = Faq::findOrFail($id);
        return view('dashboard/admin/faq', [
            'faq' => Faq::all(),
            'editFaq' => $faq
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faq = Faq::findOrFail($id);
        
        $validatedData = $request->validate([
            'question' => 'required|min:5|max:255',
            'answer' => 'required|min:5|max:255',
        ]);

        $faq->update($validatedData);
        
        return redirect('/dashboard/admin/faq')->with('success', 'Faq has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        
        return redirect('/dashboard/admin/faq')->with('success', 'Faq has been deleted!');
    }
}
