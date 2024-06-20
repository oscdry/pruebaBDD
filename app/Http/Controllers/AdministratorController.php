<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortBy = $request->get('sortBy', 'name'); 
        $sortDirection = $request->get('sortDirection', 'asc'); 
        $searchTerm = $request->input('searchTerm');
        $searchField = $request->input('searchField');
    
        $administrators = Administrator::when($searchTerm, function ($query) use ($searchTerm, $searchField) {
            return $query->where($searchField, 'like', '%'.$searchTerm.'%');
        })->orderBy($sortBy, $sortDirection)->get();
    
        return view('administrators.index', compact('administrators', 'sortBy', 'sortDirection'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:administrators|max:255',
        ]);

        $administrator = Administrator::create($validatedData);

        return redirect()->route('administrators.index')
            ->with('success', 'Administrator created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrator $administrator)
    {
        return view('administrators.show', compact('administrator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrator $administrator)
    {
        return view('administrators.edit', compact('administrator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrator $administrator)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:administrators,email,'.$administrator->id.'|max:255',
        ]);

        $administrator->update($validatedData);

        return redirect()->route('administrators.index')
            ->with('success', 'Administrator updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrator $administrator)
    {
        $administrator->delete();

        return redirect()->route('administrators.index')
            ->with('success', 'Administrator deleted successfully');
    }
}
