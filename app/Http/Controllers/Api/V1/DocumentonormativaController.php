<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Documentonormativa;
use Illuminate\Http\Request;

class DocumentonormativaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Documentonormativa::with('Tipodedocumento')->get();
        return response()->json($datos);   
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $documento = new Documentonormativa;
        $documento->nombre = $request->nombre;
        $documento->fecha = $request->fecha;
        $documento->descripcion = $request->descripcion;
        $documento->archivo = $request->archivo;
        $documento->tipodedocumento_id = $request->tipodedocumento_id;
        $documento->save();
        return response()->json($documento);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datos= Documentonormativa::find($id);
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
        $documento = Documentonormativa::find($id);
        if(!$documento) {
            return response()->json(['message' =>'Registro no encontrado0'], 404);
        }
        $documento->nombre= $request->nombre;
        $documento->fecha = $request->fecha;
        $documento->descripcion = $request->descripcion;
        $documento->archivo = $request->archivo;
        $documento->tipodedocumento_id = $request->tipodedocumento_id;
        $documento->save();
        return response()->json($documento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datos = Documentonormativa::find($id);
        if(!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
