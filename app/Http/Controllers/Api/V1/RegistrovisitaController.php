<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\RegistroVisita;
use Illuminate\Http\Request;

class RegistrovisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = \Request::query('perPage', 10);
        $registros = RegistroVisita::with('usuarioPublico', 'depedencia')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json($registros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $visita = new RegistroVisita();
        $visita->fecha = $request->fecha;
        $visita->hora_ingreso = $request->hora_ingreso;
        $visita->hora_salida = $request->hora_salida;
        $visita->asunto = $request->asunto;
        $visita->user_id = $request->user_id;
        $visita->usuario_publico_id = $request->usuario_publico_id;
        $visita->depedencia_id = $request->depedencia_id;
        $visita->save();
        return response()->json([
            "visita" => $visita,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $registros = RegistroVisita::find($id);
        return response()->json($registros);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $registros = RegistroVisita::find($id);
        $registros->update($request->all());
        return response()->json($registros);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registros = RegistroVisita::find($id);
        $registros->delete();
        return response()->json($registros);

    }
}
