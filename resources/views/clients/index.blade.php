@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h1>List of Clients</h1>
            </div>
            <div class="col-md-6">
                <form action="{{ route('clients.index') }}" method="GET">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="searchTerm">Search</label>
                            <input type="text" class="form-control mb-2" id="searchTerm" name="searchTerm" placeholder="Search...">
                        </div>
                        <div class="col-auto">
                            <select class="form-control mb-2" id="searchField" name="searchField">
                                <option value="name">Name</option>
                                <option value="email">Email</option>
                                <option value="company">Company</option>
                                <option value="contact_number">Contact Number</option>
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
                        <a href="{{ route('clients.index', ['sortBy' => 'name', 'sortDirection' => $sortBy == 'name' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
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
                        <a href="{{ route('clients.index', ['sortBy' => 'email', 'sortDirection' => $sortBy == 'email' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                            Email
                            @if($sortBy == 'email')
                                @if($sortDirection == 'asc')
                                    <i class="fas fa-arrow-up"></i>
                                @else
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('clients.index', ['sortBy' => 'company', 'sortDirection' => $sortBy == 'company' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                            Company
                            @if($sortBy == 'company')
                                @if($sortDirection == 'asc')
                                    <i class="fas fa-arrow-up"></i>
                                @else
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('clients.index', ['sortBy' => 'contact_number', 'sortDirection' => $sortBy == 'contact_number' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                            Contact Number
                            @if($sortBy == 'contact_number')
                                @if($sortDirection == 'asc')
                                    <i class="fas fa-arrow-up"></i>
                                @else
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            @endif
                        </a>
                    </th>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->company }}</td>
                        <td>{{ $client->contact_number }}</td>
                        <td>
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-warning">Show</a>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;" id="delete-form-{{ $client->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete client {{ $client->name }}?')">Delete</button>
                            </form>                                                                                                                                                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ route('clients.create') }}" class="btn btn-success">Add Client</a>
    </div>
@endsection
