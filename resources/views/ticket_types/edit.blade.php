<!-- resources/views/ticket_types/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Ticket Type</h1>
        <form action="{{ route('ticket_types.update', $ticketType->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $ticketType->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ $ticketType->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Ticket Type</button>
        </form>
    </div>
@endsection
