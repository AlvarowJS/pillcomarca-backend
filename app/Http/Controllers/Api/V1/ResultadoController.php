<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Resultado;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Resultado::all();
        return response()->json($datos);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultado = new Resultado;
        $resultado->nombre = $request->nombre;
        $resultado->archivo = $request->archivo;
        $resultado->convocatoria_id = $request->convocatoria_id;
        $resultado->save();
        return response()->json($resultado);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datos = Resultado::find($id);
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
        $resultado = Resultado::find($id);
        if (!$resultado) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $resultado->nombre = $request->nombre;
        $resultado->archivo = $request->archivo;
        $resultado->convocatoria_id = $request->convocatoria_id;
        $resultado->save();
        return response()->json($resultado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datos = Resultado::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
