<!-- resources/views/tickets/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Ticket Details</h1>
                <p><strong>Title:</strong> {{ $ticket->title }}</p>
                <p><strong>Description:</strong> {{ $ticket->description }}</p>
                <p><strong>Status:</strong> {{ $ticket->status }}</p>
                <p><strong>Type:</strong> {{ $ticket->type->name }}</p>
                <p><strong>Assigned To:</strong> {{ $ticket->assignedUser ? $ticket->assignedUser->name : 'Unassigned' }}</p>
                <!-- Agrega más detalles según tus necesidades -->
                <a href="{{ route('tickets.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
