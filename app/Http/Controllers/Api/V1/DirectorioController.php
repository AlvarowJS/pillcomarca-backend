<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Directorio;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directorio = Directorio::all(); 
        $perPage = \Request::query('perPage', 9);
        $directorio = Directorio::paginate($perPage);        
        return response()->json($directorio);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $directorio = new Directorio();
        $directorio->nombre = $request->nombre;
        $directorio->apellidos = $request->apellidos;
        $directorio->dni = $request->dni;
        $directorio->celular = $request->celular;
        $directorio->correo = $request->correo;
        $directorio->foto = $request->foto;
        $directorio->cargo = $request->cargo;
        $directorio->dependencia = $request->dependencia;
        $directorio->estado = True;
        $directorio->save();
        return response()->json([
            "data"=> $directorio
        ] ,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $directorio = Directorio::find($id);

        if(!$directorio) {
            return response()->json([
                'message' => 'directorio no encontrado', 404
            ]);
        }
        return response()->json($directorio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $directorio = Directorio::find($id);
        if (!$directorio) {
            return response()->json(['message' => 'Directorio no encontrado'], 404);
        }
        $directorio->nombre = $request->nombre;
        $directorio->apellidos = $request->apellidos;
        $directorio->dni = $request->dni;
        $directorio->celular = $request->celular;
        $directorio->correo = $request->correo;
        $directorio->foto = $request->foto;
        $directorio->cargo = $request->cargo;
        $directorio->dependencia = $request->dependencia;
        
        $directorio->save();
        return response()->json($directorio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $directorio = Directorio::find($id);
        if (!$directorio) {
            return response()->json(['message' => 'Directorio no encontrado'], 404);
        }
        $directorio->delete();
        return response()->json(['message' => 'Directorio eliminado']);
    }
}
