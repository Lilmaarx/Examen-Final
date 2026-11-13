<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    // Devuelve todos los vehiculos registrados
    public function index()
    {
        return response()->json(Vehiculo::all(), 200);
    }

    // Valida los datos y guarda un nuevo vehiculo
    public function store(Request $request)
    {
        $datos = $request->validate([
            'marca'  => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio'   => 'required|integer|min:1900|max:2027',
            'color'  => 'required|string|max:50',
        ]);

        $vehiculo = Vehiculo::create($datos);
        return response()->json($vehiculo, 201);
    }

    // Busca un vehiculo por su id
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['mensaje' => 'Vehículo no encontrado'], 404);
        }
        return response()->json($vehiculo, 200);
    }

    // Actualiza un registro existente previa validacion
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['mensaje' => 'Vehículo no encontrado'], 404);
        }

        $datos = $request->validate([
            'marca'  => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio'   => 'required|integer|min:1900|max:2027',
            'color'  => 'required|string|max:50',
        ]);

        $vehiculo->update($datos);
        return response()->json($vehiculo, 200);
    }

    // Elimina el vehiculo de la base de datos
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['mensaje' => 'Vehículo no encontrado'], 404);
        }

        $vehiculo->delete();
        return response()->json(['mensaje' => 'Vehículo eliminado'], 200);
    }
}