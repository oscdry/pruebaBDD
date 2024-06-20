<!-- resources/views/tickets/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create New Ticket</h1>
                <form action="{{ route('tickets.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="open">Open</option>
                            <option value="in_progress">In Progress</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type_id">Type:</label>
                        <select name="type_id" id="type_id" class="form-control" required>
                            @foreach($ticketTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="assigned_to">Assign To:</label>
                        <select name="assigned_to" id="assigned_to" class="form-control">
                            <option value="">-- Select Administrator --</option>
                            @foreach($administrators as $administrator)
                                <option value="{{ $administrator->id }}">{{ $administrator->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('tickets.index') }}" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
