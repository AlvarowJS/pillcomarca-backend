<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Convocatoria;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Convocatoria::with('conv_base', 'result_cv', 'resultado')->get();
        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $convocatoria = new Convocatoria;
        $convocatoria->nombre = $request->nombre;
        $convocatoria->estado = $request->estado;
        $convocatoria->save();
        return response()->json($convocatoria);
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datos = Convocatoria::find($id);
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
        $convocatoria = Convocatoria::find($id);
        if (!$convocatoria) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $convocatoria->nombre = $request->nombre;
        $convocatoria->estado = $request->estado;
        $convocatoria->save();
        return response()->json($convocatoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datos = Convocatoria::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}