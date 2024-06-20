<!-- resources/views/clients/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Client Details</h1>
                <p><strong>Name:</strong> {{ $client->name }}</p>
                <p><strong>Email:</strong> {{ $client->email }}</p>
                <p><strong>Company:</strong> {{ $client->company }}</p>
                <p><strong>Contact Number:</strong> {{ $client->contact_number }}</p>
                <p><strong>Address:</strong> {{ $client->address }}</p>
                <p><strong>City:</strong> {{ $client->city }}</p>
                <p><strong>Country:</strong> {{ $client->country }}</p>
                <a href="{{ route('clients.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
