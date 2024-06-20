@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Administrator</h1>
        <form action="{{ route('administrators.update', $administrator->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $administrator->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $administrator->email }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Administrator</button>
        </form>
    </div>
@endsection
