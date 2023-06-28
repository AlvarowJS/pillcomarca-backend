<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Gestion::with('gestiondetalle')->get();
        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gestion = new Gestion;
        $gestion->nombre = $request->nombre;
        $gestion->save();
        return response()->json($gestion);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datos = Gestion::find($id);
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
        $gestion = Gestion::find($id);
        if (!$gestion) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $gestion->nombre = $request->nombre;
        $gestion->save();
        return response()->json($gestion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datos = Gestion::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
