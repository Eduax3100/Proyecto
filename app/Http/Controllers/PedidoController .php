<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\DetallePedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Muestra la lista de pedidos.
     */
    public function index()
    {
        // Utilizamos eager loading para cargar los clientes y proveedores relacionados
        $pedidos = Pedido::with(['cliente', 'proveedor'])->get();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Muestra los detalles de un pedido específico.
     */
    public function show(Pedido $pedido)
    {
        // Cargamos las relaciones: cliente, proveedor y los detalles con sus productos
        $pedido->load(['cliente', 'proveedor', 'detalles.producto']);
        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Muestra el formulario para crear un nuevo pedido.
     */
    public function create()
    {
        // Necesitamos obtener los clientes y proveedores para asignarlos al pedido
        $clientes = Cliente::all();
        $proveedores = Proveedor::all();
        return view('pedidos.create', compact('clientes', 'proveedores'));
    }

    /**
     * Almacena un nuevo pedido en la base de datos.
     */
    public function store(Request $request)
    {
        // Puedes agregar validaciones aquí según tus requerimientos
        Pedido::create($request->all());
        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un pedido.
     */
    public function edit(Pedido $pedido)
    {
        // Obtenemos los clientes y proveedores para poder editarlos en el formulario
        $clientes = Cliente::all();
        $proveedores = Proveedor::all();
        return view('pedidos.edit', compact('pedido', 'clientes', 'proveedores'));
    }

    /**
     * Actualiza un pedido en la base de datos.
     */
    public function update(Request $request, Pedido $pedido)
    {
        // Puedes agregar validaciones aquí según sea necesario
        $pedido->update($request->all());
        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido actualizado correctamente.');
    }

    /**
     * Elimina un pedido.
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido eliminado correctamente.');
    }
}
