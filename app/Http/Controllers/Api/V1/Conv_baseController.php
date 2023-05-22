<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Conv_base;
use Illuminate\Http\Request;

class Conv_baseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Conv_base::all();
        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bases = new Conv_base;
        $bases->nombre = $request->nombre;
        $bases->archivo = $request->archivo;
        $bases->convocatoria_id = $request->convocatoria_id;
        $bases->save();
        return response()->json($bases);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datos = Conv_base::find($id);
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
        $bases = Conv_base::find($id);
        if (!$bases) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $bases->nombre = $request->nombre;
        $bases->archivo = $request->archivo;
        $bases->convocatoria_id = $request->convocatoria_id;
        $bases->save();
        return response()->json($bases);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datos = Conv_base::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}