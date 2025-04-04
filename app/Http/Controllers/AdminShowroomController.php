<?php

namespace App\Http\Controllers;

use App\Models\Skin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/admin/showroom', [
            'skins' => Skin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/admin/showroom');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'img_url' => 'required|image|file|max:1024', // Changed to 1024KB (1MB) limit
            'status' => 'required',
        ]);

        // Handle image upload
        if ($request->file('img_url')) {
            // Check file size manually as well (for added security)
            if ($request->file('img_url')->getSize() > 1024 * 1024) {
                return redirect()->back()->with('error', 'Image size must be less than 1MB!')->withInput();
            }
            
            $validatedData['img_url'] = $request->file('img_url')->store('skin-images'); // Changed folder to skin-images
        }

        Skin::create($validatedData);
        return redirect('/dashboard/admin/showroom')->with('success', 'New skin has been added!');
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
        // Get skin data to be edited
        $skin = Skin::findOrFail($id);
        
        // Send data to the showroom page
        return view('dashboard/admin/showroom', [
            'skins' => Skin::all(),
            'editSkin' => $skin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $skin = Skin::findOrFail($id);
        
        $rules = [
            'name' => 'required|min:3|max:255',
            'status' => 'required',
        ];

        // Only require image if a new one is uploaded
        if ($request->file('img_url')) {
            $rules['img_url'] = 'image|file|max:1024'; // Changed to 1024KB (1MB) limit
        }

        $validatedData = $request->validate($rules);

        // Handle image upload
        if ($request->file('img_url')) {
            // Check file size manually as well (for added security)
            if ($request->file('img_url')->getSize() > 1024 * 1024) {
                return redirect()->back()->with('error', 'Image size must be less than 1MB!')->withInput();
            }
            
            // Delete old image if it exists
            if ($skin->img_url) {
                Storage::delete($skin->img_url);
            }
            $validatedData['img_url'] = $request->file('img_url')->store('skin-images');
        }

        $skin->update($validatedData);
        
        return redirect('/dashboard/admin/showroom')->with('success', 'Skin has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skin = Skin::findOrFail($id);
        
        // Delete the image file if it exists
        if ($skin->img_url) {
            Storage::delete($skin->img_url);
        }
        
        $skin->delete();
        
        return redirect('/dashboard/admin/showroom')->with('success', 'Skin has been deleted!');
    }
}