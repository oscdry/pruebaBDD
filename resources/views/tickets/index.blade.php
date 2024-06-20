@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h1>List of Tickets</h1>
            </div>
            <div class="col-md-6">
                <form action="{{ route('tickets.index') }}" method="GET">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="searchTerm">Search</label>
                            <input type="text" class="form-control mb-2" id="searchTerm" name="searchTerm" placeholder="Search...">
                        </div>
                        <div class="col-auto">
                            <select class="form-control mb-2" id="searchField" name="searchField">
                                <option value="title">Title</option>
                                <option value="description">Description</option>
                                <!-- Agrega más opciones según tus necesidades -->
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('tickets.index', ['sortBy' => 'title', 'sortDirection' => $sortBy == 'title' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                            Title
                            @if($sortBy == 'title')
                                @if($sortDirection == 'asc')
                                    <i class="fas fa-arrow-up"></i>
                                @else
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('tickets.index', ['sortBy' => 'description', 'sortDirection' => $sortBy == 'description' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                            Description
                            @if($sortBy == 'description')
                                @if($sortDirection == 'asc')
                                    <i class="fas fa-arrow-up"></i>
                                @else
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Assigned To</th>
                    <!-- Agrega más columnas según tus necesidades -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ $ticket->description }}</td>
                        <td>{{ $ticket->status }}</td>
                        <td>{{ $ticket->type->name }}</td>
                        <td>{{ $ticket->assignedUser ? $ticket->assignedUser->name : 'Unassigned' }}</td>
                        <!-- Agrega más columnas según tus necesidades -->
                        <td>
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-warning">Show</a>
                            <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display: inline;" id="delete-form-{{ $ticket->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ticket {{ $ticket->title }}?')">Delete</button>
                            </form>                                                                                                                                                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ route('tickets.create') }}" class="btn btn-success">Add Ticket</a>
    </div>
@endsection
