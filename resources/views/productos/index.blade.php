@extends('layouts')

@section('title', 'Lista de Productos')

@section('content')
    <h1>Lista de Productos</h1>
    <a href="{{ route('productos.create') }}">Crear Producto</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Proveedor</th> <!-- Nueva columna para el proveedor -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }} unidades</td>
                    <td>{{ $producto->proveedor->nombre }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $producto) }}">Editar</a>

                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
