<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Pc;
use Illuminate\Http\Request;

class PcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Pc::all();
        return response()->json($datos);   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pc = new Pc();
        $pc->procesador = $request->procesador;
        $pc->tipo_procesador = $request->tipo_procesador;
        $pc->ram = $request->ram;
        $pc->almacenamiento = $request->almacenamiento;
        $pc->tipo = $request->tipo;
        $pc->ip = $request->ip;
        $pc->cod_patrimonial = $request->cod_patrimonial;
        $pc->dependencia_id = $request->dependencia_id;
        $pc->save();
        return response()->json($pc);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datos= Pc::find($id);
        if(!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);

        }
        return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pc = Pc::find($id);
        if(!$pc) {
            return response()->json(['message' =>'Registro no encontrado0'], 404);
        }
        $pc->procesador = $request->procesador;
        $pc->tipo_procesador = $request->tipo_procesador;
        $pc->ram = $request->ram;
        $pc->almacenamiento = $request->almacenamiento;
        $pc->tipo = $request->tipo;
        $pc->ip = $request->ip;
        $pc->cod_patrimonial = $request->cod_patrimonial;
        $pc->dependencia_id = $request->dependencia_id;
        $pc->save();
        return response()->json($pc);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datos = Pc::find($id);
        if(!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
