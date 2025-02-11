@extends('layouts')

@section('title', 'Lista de Proveedores')

@section('content')
    <h1>Lista de Proveedores</h1>
    <a href="{{ route('proveedores.create') }}">Crear Proveedor</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->email }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>
                        <a href="{{ route('proveedores.edit', $proveedor) }}">Editar</a>

                        <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar este proveedor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
