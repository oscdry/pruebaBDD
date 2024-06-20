@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h1>List of Ticket Types</h1>
            </div>
            <div class="col-md-6">
                <form action="{{ route('ticket_types.index') }}" method="GET">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="searchTerm">Search</label>
                            <input type="text" class="form-control mb-2" id="searchTerm" name="searchTerm" placeholder="Search...">
                        </div>
                        <div class="col-auto">
                            <select class="form-control mb-2" id="searchField" name="searchField">
                                <option value="name">Name</option>
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
                        <a href="{{ route('ticket_types.index', ['sortBy' => 'name', 'sortDirection' => $sortBy == 'name' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                            Name
                            @if($sortBy == 'name')
                                @if($sortDirection == 'asc')
                                    <i class="fas fa-arrow-up"></i>
                                @else
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('ticket_types.index', ['sortBy' => 'description', 'sortDirection' => $sortBy == 'description' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
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
                    <!-- Agrega más columnas según tus necesidades -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ticketTypes as $ticketType)
                    <tr>
                        <td>{{ $ticketType->name }}</td>
                        <td>{{ $ticketType->description }}</td>
                        <!-- Agrega más columnas según tus necesidades -->
                        <td>
                            <a href="{{ route('ticket_types.show', $ticketType->id) }}" class="btn btn-warning">Show</a>
                            <a href="{{ route('ticket_types.edit', $ticketType->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('ticket_types.destroy', $ticketType->id) }}" method="POST" style="display: inline;" id="delete-form-{{ $ticketType->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ticket type {{ $ticketType->name }}?')">Delete</button>
                            </form>                                                                                                                                                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ route('ticket_types.create') }}" class="btn btn-success">Add Ticket Type</a>
    </div>
@endsection
