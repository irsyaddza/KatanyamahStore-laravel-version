<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminManageuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/admin/manageuser', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect('/dashboard/admin/manageuser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect('/dashboard/admin/manageuser');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect('/dashboard/admin/manageuser');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard/admin/manageuser', [
            'users' => User::all(),
            'editUser' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        
        $validatedData = $request->validate([
            'is_admin' => 'required|boolean'
        ]);
        
        $user->update($validatedData);
        
        return redirect('/dashboard/admin/manageuser')->with('success', 'User role has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect('/dashboard/admin/manageuser');
    }
}