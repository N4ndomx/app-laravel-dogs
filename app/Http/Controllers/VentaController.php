<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['producto'])->get();
        $productos = Producto::all();
        return view('ventas.index', compact('ventas', 'productos'));
    }

    public function create()
    {
        return view('ventas.create');
    }

    public function store(Request $request)
    {
        $request->merge(['fecha' => now()]);
        $request->validate([
            'id_productp' => 'required|exists:mascotas,id',
            'cantida' => 'required|numeric',
            'total' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        Venta::create($request->all());

        return redirect()->route('ventas.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit(Venta $venta)
    {
        return view('ventass.edit', compact('venta'));
    }

    public function update(Request $request, Venta $venta)
    {
        $data = $request->validate([
            'id_productp' => 'required|exists:mascotas,id',
            'cantida' => 'required|numeric',
            'total' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $venta->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    public function destroy(Venta $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }
}
