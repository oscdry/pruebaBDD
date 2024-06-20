@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Client</h1>
        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}">
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" id="company" name="company" value="{{ $client->company }}">
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $client->contact_number }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Client</button>
        </form>
    </div>
@endsection
