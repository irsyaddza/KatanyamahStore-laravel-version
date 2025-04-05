<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/admin/team', [
            'team' => Team::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/admin/team');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'team_name' => 'required',
            'team_rank' => 'required',
            'team_img' => 'required|file|max:1024',
            'team_bio' => 'required',
            'team_instagram' => 'required',
        ]);

        // Handle file upload
        if ($request->file('team_img')) {
            $validatedData['team_img'] = $request->file('team_img')->store('team-images', 'public');
        }

        // Create the record
        Team::create($validatedData);

        // Handle AJAX requests
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect('/dashboard/admin/team')->with('success', 'New team section has been added!');
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
        $team = Team::findOrFail($id);
        return view('dashboard/admin/team', [
            'team' => Team::all(),
            'editTeam' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);
        
        $rules = [
            'team_name' => 'required',
            'team_rank' => 'required',
            'team_img' => 'required|file|max:1024',
            'team_bio' => 'required',
            'team_instagram' => 'required',
        ];

        // Only require image if one is uploaded
        if ($request->file('team_img')) {
            $rules['team_img'] = 'image|file|max:1024';
        }

        $validatedData = $request->validate($rules);

        // Handle file upload
        if ($request->file('team_img')) {
            // Delete old image if exists
            if ($team->team_img && Storage::disk('public')->exists($team->team_img)) {
                Storage::disk('public')->delete($team->team_img);
            }
            
            $validatedData['team_img'] = $request->file('team_img')->store('team-images', 'public');
        }

        // Update the record
        $team->update($validatedData);
        
        // Handle AJAX requests
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect('/dashboard/admin/team')->with('success', 'Team section has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        
        // Delete associated image
        if ($team->team_img && Storage::disk('public')->exists($team->team_img)) {
            Storage::disk('public')->delete($team->team_img);
        }
        
        $team->delete();
        
        return redirect('/dashboard/admin/team')->with('success', 'Team section has been deleted!');
    }
}
