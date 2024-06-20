@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Administrator Details</h1>
                <p><strong>Name:</strong> {{ $administrator->name }}</p>
                <p><strong>Email:</strong> {{ $administrator->email }}</p>
                <!-- Agrega más detalles según tus necesidades -->
                <a href="{{ route('administrators.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
