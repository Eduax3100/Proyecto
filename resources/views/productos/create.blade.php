@extends('layouts')

@section('title', 'Crear Producto')

@section('content')
    <h1>Crear Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Descripción:</label>
        <input type="text" name="descripcion">

        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required>

        <label>Stock:</label>
        <input type="number" name="stock" min="0" required>

        <label>Proveedor:</label>
        <select name="proveedor_id" required>
            <option value="">Seleccione un proveedor</option>
            @foreach($proveedores as $proveedores)
                <option value="{{ $proveedores->id }}">{{ $proveedores->nombre }}</option>
            @endforeach
        </select>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('productos.index') }}">Cancelar</a>
@endsection
