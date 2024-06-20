<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\User;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortBy = $request->get('sortBy', 'title'); 
        $sortDirection = $request->get('sortDirection', 'asc'); 
        $searchTerm = $request->input('searchTerm');
        $searchField = $request->input('searchField');
    
        $tickets = Ticket::when($searchTerm, function ($query) use ($searchTerm, $searchField) {
            return $query->where($searchField, 'like', '%'.$searchTerm.'%');
        })->orderBy($sortBy, $sortDirection)->get();
    
        return view('tickets.index', compact('tickets', 'sortBy', 'sortDirection'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ticketTypes = TicketType::all();
        $users = User::all();
        return view('tickets.create', compact('ticketTypes', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'type_id' => 'required',
            'assigned_to' => 'nullable',
        ]);

        $ticket = Ticket::create($validatedData);

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $ticketTypes = TicketType::all();
        $users = User::all();
        return view('tickets.edit', compact('ticket', 'ticketTypes', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'type_id' => 'required',
            'assigned_to' => 'nullable',
        ]);
        

        $ticket->update($validatedData);

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket deleted successfully');
    }
}
