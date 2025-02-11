<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use Illuminate\Http\Request;

class DetallePedidoController extends Controller
{
    public function store(Request $request)
    {
        DetallePedido::create($request->all());
        return redirect()->route('pedidos.show', $request->pedido_id);
    }

    public function update(Request $request, DetallePedido $detallePedido)
    {
        $detallePedido->update($request->all());
        return redirect()->route('pedidos.show', $detallePedido->pedido_id);
    }

    public function destroy(DetallePedido $detallePedido)
    {
        $detallePedido->delete();
        return redirect()->route('pedidos.show', $detallePedido->pedido_id);
    }
}
