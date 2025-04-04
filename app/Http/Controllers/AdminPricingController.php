<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class AdminPricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/admin/pricing', [
            'pricing' => Pricing::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/admin/pricing');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'price_title' => 'required|min:5|max:255',
            'price_desc' => 'required|min:5|max:255',
            'price' => 'required',
            'price_feature1' => 'required|min:5|max:255',
            'price_feature2' => 'required|min:5|max:255',
            'price_feature3' => 'required|min:5|max:255',
            'price_feature4' => 'required|min:5|max:255',
            'price_feature5' => 'required|min:5|max:255',
        ],[
            'price_feature1.required' => 'The field feature 1 is required.',
            'price_feature2.required' => 'The field feature 2 is required.',
            'price_feature3.required' => 'The field feature 3 is required.',
            'price_feature4.required' => 'The field feature 4 is required.',
            'price_feature5.required' => 'The field feature 5 is required.',
            // Tambahkan pesan untuk validasi min jika diperlukan
        ]);

        Pricing::create($validatedData);
        return redirect('/dashboard/admin/pricing')->with('success', 'New pricing plan has been added!');
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
        // Ambil data pricing yang akan diedit
        $pricing = Pricing::findOrFail($id);
        
        // Kirim data ke halaman pricing yang sama
        // Ini akan menampilkan form dengan data yang sudah ada
        return view('dashboard/admin/pricing', [
            'pricing' => Pricing::all(),
            'editPricing' => $pricing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pricing = Pricing::findOrFail($id);
        
        $validatedData = $request->validate([
            'price_title' => 'required|min:5|max:255',
            'price_desc' => 'required|min:5|max:255',
            'price' => 'required',
            'price_feature1' => 'required|min:5|max:255',
            'price_feature2' => 'required|min:5|max:255',
            'price_feature3' => 'required|min:5|max:255',
            'price_feature4' => 'required|min:5|max:255',
            'price_feature5' => 'required|min:5|max:255',
        ],[
            'price_feature1.required' => 'The field feature 1 is required.',
            'price_feature2.required' => 'The field feature 2 is required.',
            'price_feature3.required' => 'The field feature 3 is required.',
            'price_feature4.required' => 'The field feature 4 is required.',
            'price_feature5.required' => 'The field feature 5 is required.',
            // Tambahkan pesan untuk validasi min jika diperlukan
        ]);

        $pricing->update($validatedData);
        
        return redirect('/dashboard/admin/pricing')->with('success', 'Pricing plan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pricing = Pricing::findOrFail($id);
        $pricing->delete();
        
        return redirect('/dashboard/admin/pricing')->with('success', 'Pricing plan has been deleted!');
    }
}