<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Entrevista;
use Illuminate\Http\Request;

class EntrevistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Entrevista::all();
        return response()->json($datos);    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entrevista = new Entrevista;
        $entrevista->nombre = $request->nombre;
        $entrevista->archivo = $request->archivo;
        $entrevista->convocatoria_id = $request->convocatoria_id;
        $entrevista->save();
        return response()->json($entrevista);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datos= Entrevista::find($id);
        if(!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);

        }
        return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $entrevista = Entrevista::find($id);
        if(!$entrevista) {
            return response()->json(['message' =>'Registro no encontrado0'], 404);
        }
        $entrevista->nombre= $request->nombre;
        $entrevista->archivo= $request->archivo;
        $entrevista->convocatoria_id = $request->convocatoria_id;
        $entrevista->save();
        return response()->json($entrevista);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datos = Entrevista::find($id);
        if(!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
