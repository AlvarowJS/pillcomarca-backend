<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SeguridadArchivo;
use App\Models\SeguridadCategoria;
use App\Models\SeguridadColeccion;
use Illuminate\Http\Request;

class SeguridadController extends Controller
{
    // Publico
    public function index()
    {
        $datos = SeguridadCategoria::all();
        return response()->json($datos);
    }

    // Privado
    public function crearArchivo(Request $request)
    {
        $archivo = new SeguridadArchivo;
        $archivo->nombre_archivo = $request->nombre;
        $archivo->documento = $request->documento;
        $archivo->seguridad_coleccion_id = $request->seguridad_coleccion_id;
        $archivo->save();
        return response()->json($archivo);
    }
    public function crearColeccion(Request $request)
    {
        $coleccion = new SeguridadColeccion;
        $coleccion->nombre_coleccion = $request->nombre_coleccion;
        $coleccion->seguridad_categoria_id = $request->seguridad_categoria_id;
        $coleccion->save();
        return response()->json($coleccion);
    }
    public function crearCategoria(Request $request)
    {
        $categoria = new SeguridadCategoria;
        $categoria->categoria = $request->categoria;
        $categoria->save();
        return response()->json($categoria);
    }
}
