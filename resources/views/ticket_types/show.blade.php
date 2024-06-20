<!-- resources/views/ticket_types/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Ticket Type Details</h1>
                <p><strong>Name:</strong> {{ $ticketType->name }}</p>
                <p><strong>Description:</strong> {{ $ticketType->description }}</p>
                <!-- Agrega más detalles según tus necesidades -->
                <a href="{{ route('ticket_types.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
