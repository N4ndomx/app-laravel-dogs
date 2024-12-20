<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MascotaController extends Controller
{
    /**
     * Muestra una lista de todas las mascotas.
     */
    public function index()
    {
        $mascotas = Mascota::all();
        return view('mascotas.index', compact('mascotas'));
    }

    /**
     * Muestra el formulario para crear una nueva mascota.
     */
    public function create()
    {
        return view('mascotas.create');
    }

    /**
     * Almacena una nueva mascota en la base de datos.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'edad' => 'nullable|integer',
            'peso' => 'nullable|numeric',
            'dueno' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'imagen' => 'required|string',
        ]);

        Mascota::create($data);

        return redirect()->route('mascotas.index')->with('success', 'Mascota registrada exitosamente.');
    }

    /**
     * Muestra los detalles de una mascota específica.
     */
    public function show(Mascota $mascota)
    {
        return view('mascotas.show', compact('mascota'));
    }

    /**
     * Muestra el formulario para editar una mascota existente.
     */
    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    /**
     * Actualiza los datos de una mascota en la base de datos.
     */
    public function update(Request $request, Mascota $mascota)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'edad' => 'nullable|integer',
            'peso' => 'nullable|numeric',
            'dueno' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'imagen' => 'required|string',
        ]);


        $mascota->update($data);

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada exitosamente.');
    }

    /**
     * Elimina una mascota de la base de datos.
     */
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();

        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada exitosamente.');
    }
}
