<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\DetallePedido;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function show(Producto $producto)
    {
        $detalles = DetallePedido::where('producto_id', $producto->id)->get();
        return view('productos.show', compact('producto', 'detalles'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('productos.create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        Producto::create($request->all());
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        $proveedores = Proveedor::all();
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
