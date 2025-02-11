@extends('layouts')

@section('title', 'Editar Proveedor')

@section('content')
    <h1>Editar Proveedor</h1>

    <form action="{{ route('proveedores.update', ['proveedore' => $proveedor->id]) }}" method="POST">        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $proveedor->nombre }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $proveedor->email }}" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono" value="{{ $proveedor->telefono }}" required>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('proveedores.index') }}">Cancelar</a>
@endsection
