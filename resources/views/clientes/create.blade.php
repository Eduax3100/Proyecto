@extends('layouts')

@section('title', 'Crear Cliente')

@section('content')
    <h1>Crear Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono" required>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('clientes.index') }}">Cancelar</a>
@endsection
