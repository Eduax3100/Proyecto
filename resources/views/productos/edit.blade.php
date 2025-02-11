@extends('layouts')

@section('title', 'Editar Producto')

@section('content')
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" required>

        <label>Descripción:</label>
        <input type="text" name="descripcion" value="{{ $producto->descripcion }}" required>

        <label>Precio:</label>
        <input type="number" name="precio" value="{{ $producto->precio }}" step="0.01" required>

        <label>Stock:</label>
        <input type="number" name="stock" value="{{ $producto->stock }}" min="0" required>

        <label>Proveedor:</label>
        <select name="proveedor_id" required>
            <option value="">Seleccione un proveedor</option>
            @foreach($proveedores as $proveedores)
                <option value="{{ $proveedores->id }}">{{ $proveedores->nombre }}</option>
            @endforeach
        </select>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('productos.index') }}">Cancelar</a>
@endsection
