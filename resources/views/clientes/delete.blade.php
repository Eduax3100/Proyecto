@extends('layouts')

@section('title', 'Eliminar Cliente')

@section('content')
    <h1>¿Estás seguro de que quieres eliminar este cliente?</h1>

    <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
    <p><strong>Email:</strong> {{ $cliente->email }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>

    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Sí, eliminar</button>
    </form>

    <a href="{{ route('clientes.index') }}">Cancelar</a>
@endsection
