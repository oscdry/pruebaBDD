<!-- resources/views/ticket_types/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create New Ticket Type</h1>
                <form action="{{ route('ticket_types.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('ticket_types.index') }}" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
