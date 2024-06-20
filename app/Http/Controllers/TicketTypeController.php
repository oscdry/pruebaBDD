<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketType;

class TicketTypeController extends Controller
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
    
        $ticketTypes = TicketType::when($searchTerm, function ($query) use ($searchTerm, $searchField) {
            return $query->where($searchField, 'like', '%'.$searchTerm.'%');
        })->orderBy($sortBy, $sortDirection)->get();
    
        return view('ticket_types.index', compact('ticketTypes', 'sortBy', 'sortDirection'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ticket_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:ticket_types|max:255',
            'description' => 'nullable',
        ]);

        $ticketType = TicketType::create($validatedData);

        return redirect()->route('ticket_types.index')
            ->with('success', 'Ticket type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketType $ticketType)
    {
        return view('ticket_types.show', compact('ticketType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketType $ticketType)
    {
        return view('ticket_types.edit', compact('ticketType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketType $ticketType)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:ticket_types,name,'.$ticketType->id.'|max:255',
            'description' => 'nullable',
        ]);

        $ticketType->update($validatedData);

        return redirect()->route('ticket_types.index')
            ->with('success', 'Ticket type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketType $ticketType)
    {
        $ticketType->delete();

        return redirect()->route('ticket_types.index')
            ->with('success', 'Ticket type deleted successfully');
    }
}
