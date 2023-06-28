<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Gestion;
use App\Models\Gestiondetalle;
use Illuminate\Http\Request;

class GestiondetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $datos = Gestiondetalle::all();
        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $result = new Gestiondetalle;
        $result->nombre = $request->nombre;
        $result->link = $request->link;
        $result->gestion_id = $request->gestion_id;
        $result->save();
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     */
     public function show($id)
    {
        $datos= Gestiondetalle::find($id);
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
        $result = Gestiondetalle::find($id);
        if(!$result) {
            return response()->json(['message' =>'Registro no encontrado0'], 404);
        }
        $result->nombre= $request->nombre;
        $result->link= $request->link;
        $result->gestion_id = $request->gestion_id;
        $result->save();
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datos = Gestiondetalle::find($id);
        if(!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
