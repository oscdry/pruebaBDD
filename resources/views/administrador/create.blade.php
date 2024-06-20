@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create New Administrator</h1>
                <form action="{{ route('administrators.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('administrators.index') }}" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
