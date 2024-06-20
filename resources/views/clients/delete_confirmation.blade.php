@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delete Confirmation</h1>
        <p>Are you sure you want to delete the client {{ $client->name }}?</p>
        <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" name="confirm_delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">Confirm Delete</button>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
