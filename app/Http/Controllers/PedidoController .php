<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\DetallePedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    
    public function index()
    {
        
        $pedidos = Pedido::with(['cliente', 'proveedor'])->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function show(Pedido $pedido)
    {
         cliente, proveedor y los detalles con sus productos
        $pedido->load(['cliente', 'proveedor', 'detalles.producto']);
        return view('pedidos.show', compact('pedido'));
    }

    
    public function create()
    { para asignarlos al pedido
        $clientes = Cliente::all();
        $proveedores = Proveedor::all();
        return view('pedidos.create', compact('clientes', 'proveedores'));
    }

    
    public function store(Request $request)
    {
        
        Pedido::create($request->all());
        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido creado correctamente.');
    }

    
    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        $proveedores = Proveedor::all();
        return view('pedidos.edit', compact('pedido', 'clientes', 'proveedores'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        
        $pedido->update($request->all());
        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido actualizado correctamente.');
    }

    
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido eliminado correctamente.');
    }
}
