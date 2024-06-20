<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
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
    
        $clients = Client::when($searchTerm, function ($query) use ($searchTerm, $searchField) {
            return $query->where($searchField, 'like', '%'.$searchTerm.'%');
        })->orderBy($sortBy, $sortDirection)->get();
    
        return view('clients.index', compact('clients', 'sortBy', 'sortDirection'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $client = Client::create($validatedData);

        return redirect()->route('clients.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'contact_number' => 'required',
            'address' => 'nullable', // Campo opcional
            'city' => 'nullable', // Campo opcional
            'country' => 'nullable', // Campo opcional
        ]);
        

        $client->update($validatedData);

        return redirect()->route('clients.index')
            ->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully');
    }
}
