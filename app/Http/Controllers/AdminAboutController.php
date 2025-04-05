<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/admin/about', [
            'about' => About::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/admin/about');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'story' => 'required|min:10',
            'story2' => 'required|min:10',
            'story_img' => 'required|image|file|max:1024',
            'values1' => 'required|min:3',
            'title_values1' => 'required|min:3',
            'values2' => 'required|min:3',
            'title_values2' => 'required|min:3',
            'values3' => 'required|min:3',
            'title_values3' => 'required|min:3',
        ]);

        // Handle file upload
        if ($request->file('story_img')) {
            $validatedData['story_img'] = $request->file('story_img')->store('about-images', 'public');
        }

        // Create the record
        About::create($validatedData);

        // Handle AJAX requests
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect('/dashboard/admin/about')->with('success', 'New about section has been added!');
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
        $about = About::findOrFail($id);
        return view('dashboard/admin/about', [
            'about' => About::all(),
            'editAbout' => $about
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);
        
        $rules = [
            'story' => 'required|min:10',
            'story2' => 'required|min:10',
            'values1' => 'required|min:3',
            'title_values1' => 'required|min:3',
            'values2' => 'required|min:3',
            'title_values2' => 'required|min:3',
            'values3' => 'required|min:3',
            'title_values3' => 'required|min:3',
        ];

        // Only require image if one is uploaded
        if ($request->file('story_img')) {
            $rules['story_img'] = 'image|file|max:1024';
        }

        $validatedData = $request->validate($rules);

        // Handle file upload
        if ($request->file('story_img')) {
            // Delete old image if exists
            if ($about->story_img && Storage::disk('public')->exists($about->story_img)) {
                Storage::disk('public')->delete($about->story_img);
            }
            
            $validatedData['story_img'] = $request->file('story_img')->store('about-images', 'public');
        }

        // Update the record
        $about->update($validatedData);
        
        // Handle AJAX requests
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect('/dashboard/admin/about')->with('success', 'About section has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = About::findOrFail($id);
        
        // Delete associated image
        if ($about->story_img && Storage::disk('public')->exists($about->story_img)) {
            Storage::disk('public')->delete($about->story_img);
        }
        
        $about->delete();
        
        return redirect('/dashboard/admin/about')->with('success', 'About section has been deleted!');
    }
}