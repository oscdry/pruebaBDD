<!-- resources/views/ticket_types/confirm_delete.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delete Confirmation</h1>
        <p>Are you sure you want to delete the ticket type "{{ $ticketType->name }}"?</p>
        <form action="{{ route('ticket_types.destroy', $ticketType->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" name="confirm_delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ticket type?')">Confirm Delete</button>
            <a href="{{ route('ticket_types.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
