<!-- resources/views/tickets/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Ticket</h1>
        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $ticket->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $ticket->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type_id">Type</label>
                <select class="form-control" id="type_id" name="type_id" required>
                    @foreach($ticketTypes as $type)
                        <option value="{{ $type->id }}" {{ $ticket->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="assigned_to">Assign To</label>
                <select class="form-control" id="assigned_to" name="assigned_to">
                    <option value="">-- Select Administrator --</option>
                    @foreach($administrators as $administrator)
                        <option value="{{ $administrator->id }}" {{ $ticket->assigned_to == $administrator->id ? 'selected' : '' }}>{{ $administrator->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Ticket</button>
        </form>
    </div>
@endsection
