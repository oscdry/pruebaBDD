<!-- resources/views/clients/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add New Client</h1>
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="company">Company:</label>
                        <input type="text" name="company" id="company" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number:</label>
                        <input type="text" name="contact_number" id="contact_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input type="text" name="country" id="country" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('clients.index') }}" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
