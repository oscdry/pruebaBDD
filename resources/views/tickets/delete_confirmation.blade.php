<!-- resources/views/tickets/confirm_delete.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delete Confirmation</h1>
        <p>Are you sure you want to delete the ticket "{{ $ticket->title }}"?</p>
        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" name="confirm_delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ticket?')">Confirm Delete</button>
            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection