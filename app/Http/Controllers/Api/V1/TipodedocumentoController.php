<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tipodedocumento;
use Illuminate\Http\Request;

class TipodedocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Tipodedocumento::with('documentonormativa')->get();
        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Tipodedocumento;
        $tipo->nombre = $request->nombre;
        $tipo->save();
        return response()->json($tipo);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datos = Tipodedocumento::find($id);
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
        $tipo = Tipodedocumento::find($id);
        if (!$convocatoria) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $tipo->nombre = $request->nombre;
        $tipo->save();
        return response()->json($tipo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datos = Tipodedocumento::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
