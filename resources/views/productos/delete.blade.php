@extends('layouts')

@section('title', 'Eliminar Producto')

@section('content')
    <h1>¿Estás seguro de que quieres eliminar este producto?</h1>

    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Descripción:</strong> ${{ $producto->descripcion }}</p>
    <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
    <p><strong>Stock:</strong> ${{ $producto->stock }}</p>

    <form action="{{ route('productos.destroy', $producto) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Sí, eliminar</button>
    </form>

    <a href="{{ route('productos.index') }}">Cancelar</a>
@endsection
