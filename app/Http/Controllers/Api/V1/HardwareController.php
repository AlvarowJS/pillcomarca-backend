<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\HardwareResource;
use App\Models\Hardware;
use App\Models\Dependencia;
use App\Models\Tipo;
use Illuminate\Http\Request;


class HardwareController extends Controller
{
    public function ticketsPorCodPatri($cod_patri)
    {
        // Buscar todos los registros de hardware asociados a la dependencia específica
        $hardware = Hardware::where('cod_patri', $cod_patri)->get();

        return response()->json($hardware);
    }
    public function hardwarePorDependencia($dependencia_id)
    {
        // Buscar todos los registros de hardware asociados a la dependencia específica
        $hardware = Hardware::where('dependencia_id', $dependencia_id)->get();

        return response()->json($hardware);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los registros de hardware
        $hardwares = Hardware::all();
        
        // Transformar los datos utilizando el recurso de hardware
        return HardwareResource::collection($hardwares);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar que la dependencia con el ID proporcionado existe en la base de datos
        $dependencia = Dependencia::find($request->dependencia_id);
    
        if (!$dependencia) {
            // Si la dependencia no existe, devuelve un error
            return response()->json(['error' => 'La dependencia no existe'], 404);
        }
        $tipo = Tipo::find($request->tipo_id);
    
        if (!$tipo) {
            return response()->json(['error' => 'El tipo de Hardware no existe'], 404);
        }
    
        // Si la dependencia existe, crea la Hardware
        $hardware = new Hardware();
        $hardware->tipo_id = $request->tipo_id;
        $hardware->procesador = $request->procesador;
        $hardware->ram = $request->ram;
        $hardware->almacenamiento = $request->almacenamiento;
        $hardware->tipo_alma = $request->tipo_alma;
        $hardware->ip = $request->ip;
        $hardware->marca = $request->marca;
        $hardware->especif = $request->especif;
        $hardware->cod_patri = $request->cod_patri;
        $hardware->dependencia_id = $request->dependencia_id;
        $hardware->save();
    
        // Devolver la nueva hardware utilizando el recurso de hardware
        return new HardwareResource($hardware);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datos= Hardware::find($id);
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
        $Hardware = Hardware::find($id);
        if(!$Hardware) {
            return response()->json(['message' =>'Registro no encontrado0'], 404);
        }
        $tipo = Tipo::find($request->tipo_id);
        if (!$tipo) {
            // Si la dependencia no existe, devuelve un error
            return response()->json(['error' => 'El tipo de Hardware no existe'], 404);
        }
        $Hardware->procesador = $request->procesador;
        $Hardware->ram = $request->ram;
        $Hardware->almacenamiento = $request->almacenamiento;
        $Hardware->tipo_alma = $request->tipo_alma;
        $Hardware->ip = $request->ip;
        $Hardware->marca = $request->marca;
        $Hardware->especif = $request->especif;
        $Hardware->cod_patri = $request->cod_patri;
        $Hardware->dependencia_id = $request->dependencia_id;
        $Hardware->tipo_id = $request->tipo_id;
        $Hardware->save();
        return response()->json($Hardware);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datos = Hardware::find($id);
        if(!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}