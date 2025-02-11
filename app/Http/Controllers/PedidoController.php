<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('pedidos.create', compact('clientes', 'proveedores', 'productos'));
    }

    public function store(Request $request)
    {
        $pedido = Pedido::create($request->only(['cliente_id', 'proveedor_id', 'total']));

        foreach ($request->productos as $producto) {
            DetallePedido::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $producto['producto_id'],
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio_unitario'],
            ]);
        }

        return redirect()->route('pedidos.index');
    }

    public function show(Pedido $pedido)
    {
        $detalles = $pedido->detalles;
        return view('pedidos.show', compact('pedido', 'detalles'));
    }

    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('pedidos.edit', compact('pedido', 'clientes', 'proveedores', 'productos'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $pedido->update($request->only(['cliente_id', 'proveedor_id', 'total']));

        foreach ($request->productos as $producto) {
            $detalle = DetallePedido::find($producto['id']);
            $detalle->update([
                'producto_id' => $producto['producto_id'],
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio_unitario'],
            ]);
        }

        return redirect()->route('pedidos.index');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->detalles()->delete();
        $pedido->delete();
        return redirect()->route('pedidos.index');
    }
}
