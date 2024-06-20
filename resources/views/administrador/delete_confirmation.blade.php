@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delete Confirmation</h1>
        <p>Are you sure you want to delete the administrator "{{ $administrator->name }}"?</p>
        <form action="{{ route('administrators.destroy', $administrator->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" name="confirm_delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this administrator?')">Confirm Delete</button>
            <a href="{{ route('administrators.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
