@extends('layouts')

@section('title', 'Crear Proveedor')

@section('content')
    <h1>Crear Proveedor</h1>

    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono" required>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('proveedores.index') }}">Cancelar</a>
@endsection
