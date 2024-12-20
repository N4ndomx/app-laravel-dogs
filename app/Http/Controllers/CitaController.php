<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Mascota;
use App\Models\Servicio;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Muestra todas las citas.
     */
    public function index()
    {
        // $citas = Cita::with(['mascota', 'servicio'])->get();
        // $mascotas = Mascota::all();
        // $servicios = Servicio::all();

        // return view('citas.index', compact('citas', 'mascotas', 'servicios'));

        // Filtrar citas solo de mascotas activas
        $citas = Cita::whereHas('mascota', function ($query) {
            $query->whereNull('deleted_at'); // Asegura que la mascota no esté eliminada lógicamente
        })->with(['mascota', 'servicio'])->get();

        // Obtener todas las mascotas y servicios activos
        $mascotas = Mascota::whereNull('deleted_at')->get(); // Opcional, dependiendo de si necesitas solo mascotas activas
        $servicios = Servicio::all(); // Asume que los servicios no tienen SoftDeletes

        return view('citas.index', compact('citas', 'mascotas', 'servicios'));
    }

    /**
     * Muestra el formulario para crear una nueva cita.
     */
    public function create()
    {
        $mascotas = Mascota::all();
        $servicios = Servicio::all();

        return view('citas.create', compact('mascotas', 'servicios'));
    }

    /**
     * Almacena una nueva cita en la base de datos.
     */
    public function store(Request $request)
    {
        $request->merge(['estado' => 'Pendiente']);

        $request->validate([
            'id_mascota' => 'required|exists:mascotas,id',
            'servicio_id' => 'required|exists:servicios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'required|in:Pendiente,Realizado,Cancelado',
        ]);

        Cita::create($request->all());

        return redirect()->route('citas.index')->with('success', 'Cita registrada exitosamente.');
    }

    /**
     * Muestra los detalles de una cita específica.
     */
    public function show($id)
    {
        $cita = Cita::with(['mascota', 'servicio'])->findOrFail($id);

        return view('citas.show', compact('cita'));
    }

    /**
     * Muestra el formulario para editar una cita existente.
     */
    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        $mascotas = Mascota::all();
        $servicios = Servicio::all();

        return view('citas.edit', compact('cita', 'mascotas', 'servicios'));
    }

    /**
     * Actualiza una cita en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);

        $request->validate([
            'id_mascota' => 'required|exists:mascotas,id',
            'servicio_id' => 'required|exists:servicios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'required|in:Pendiente,Realizado,Cancelado',
        ]);

        $cita->update($request->all());

        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente.');
    }

    /**
     * Elimina una cita de la base de datos.
     */
    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();

        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente.');
    }
}
