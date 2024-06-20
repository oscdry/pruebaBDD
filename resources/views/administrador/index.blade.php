@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h1>List of Administrators</h1>
            </div>
            <!-- Puedes eliminar el formulario de búsqueda si no es necesario -->
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- Agrega más columnas según tus necesidades -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($administrators as $administrator)
                    <tr>
                        <td>{{ $administrator->name }}</td>
                        <td>{{ $administrator->email }}</td>
                        <!-- Agrega más columnas según tus necesidades -->
                        <td>
                            <a href="{{ route('administrators.show', $administrator->id) }}" class="btn btn-warning">Show</a>
                            <a href="{{ route('administrators.edit', $administrator->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('administrators.destroy', $administrator->id) }}" method="POST" style="display: inline;" id="delete-form-{{ $administrator->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete administrator {{ $administrator->name }}?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ route('administrators.create') }}" class="btn btn-success">Add Administrator</a>
    </div>
@endsection
