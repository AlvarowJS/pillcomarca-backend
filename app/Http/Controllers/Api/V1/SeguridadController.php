<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Seguridad;
use Illuminate\Http\Request;

class SeguridadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Seguridad::with()->get();
        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $seguridad = new Seguridad;
        $seguridad->nombre = $request->nombre;
        $seguridad->fecha = $request->fecha;
        $seguridad->archivo = $request->archivo;
        $seguridad->save();
        return response()->json($seguridad);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datos = Seguridad::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $seguridad = Seguridad::find($id);
        if (!$seguridad) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $seguridad->nombre = $request->nombre;
        $seguridad->fecha = $request->fecha;
        $seguridad->archivo = $request->archivo;
        $seguridad->save();
        return response()->json($seguridad);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datos = Seguridad::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
