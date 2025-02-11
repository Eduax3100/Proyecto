@extends('layouts')

@section('title', 'Editar Cliente')

@section('content')
    <h1>Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $cliente->nombre }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $cliente->email }}" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono" value="{{ $cliente->telefono }}" required>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('clientes.index') }}">Cancelar</a>
@endsection
