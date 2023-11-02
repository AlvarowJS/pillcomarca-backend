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
        $datos = SeguridadCategoria::with('seguridadColeccions.seguridadArchivos')->get();
        return response()->json($datos);
    }

    // Privado
    // // Archivos
    // // // Listar Archivos
    public function listarArchivos()
    {
        $archivos = SeguridadArchivo::all();
        return response()->json($archivos);
    }
    // // //Crear Archivos
    public function crearArchivo(Request $request)
    {
        $archivo = new SeguridadArchivo;
        $archivo->nombre_archivo = $request->nombre_archivo;
        $archivo->documento = $request->documento;
        $archivo->seguridad_coleccion_id = $request->seguridad_coleccion_id;
        $archivo->save();
        return response()->json($archivo);
    }
    // // // Actualizar Archivos
    public function actualizarArchivo(Request $request, $id)
    {

        $archivo = SeguridadArchivo::find($id);
        if(!$archivo){
            return response()->json(['message'=> 'Registro no encontrado'], 404);
        }        
        $archivo->nombre_archivo = $request->nombre_archivo;
        $archivo->documento = $request->documento;
        $archivo->seguridad_coleccion_id = $request->seguridad_coleccion_id;
        $archivo->save();
        return response()->json($archivo);
    }
    // // // Eliminar Archivos
    public function eliminarArchivo(Request $request, $id)
    {
        
        $archivo = SeguridadArchivo::find($id);
        if (!$archivo) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }        
        $archivo->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }

    // // Coleccioness
    // // // Listar Colecciones
    public function listarColeccion()
    {
        $coleccion = SeguridadColeccion::all();
        return response()->json($coleccion);
    }
    // // // Crear Colecciones
    public function crearColeccion(Request $request)
    {
        $coleccion = new SeguridadColeccion;
        $coleccion->nombre_coleccion = $request->nombre_coleccion;
        $coleccion->seguridad_categoria_id = $request->seguridad_categoria_id;
        $coleccion->save();
        return response()->json($coleccion);
    }
    // // // Actualizar Archivos
    public function actualizarColeccion(Request $request, $id)
    {
        $coleccion = SeguridadColeccion::find($id);
        if(!$coleccion){
            return response()->json(['message'=> 'Registro no encontrado'], 404);
        }        
        $coleccion->nombre_coleccion = $request->nombre_coleccion;
        $coleccion->seguridad_categoria_id = $request->seguridad_categoria_id;
        $coleccion->save();
        return response()->json($coleccion);
    }
    // // // Eliminar Archivos
    public function eliminarColeccion($id)
    {
        $coleccion = SeguridadColeccion::find($id);
        if (!$coleccion) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }        
        $coleccion->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }

    // // Categorias
    // // // LIstar Categorias
    public function listarCategoria()
    {
        $categoria = SeguridadCategoria::all();
        return response()->json($categoria);
    }
    // // //Crear Categorias
    public function crearCategoria(Request $request)
    {
        $categoria = new SeguridadCategoria;
        $categoria->categoria = $request->categoria;
        $categoria->save();
        return response()->json($categoria);
    }
    // // // Actualizar Archivos
    public function actualizarCategoria(Request $request, $id)
    {
        $categoria = SeguridadCategoria::find($id);
        if(!$categoria){
            return response()->json(['message'=> 'Registro no encontrado'], 404);
        }        
        $categoria->categoria = $request->categoria;
        $categoria->save();
        return response()->json($categoria);
    }

    // // // Eliminar Archivos
    public function eliminarCategoria($id)
    {
        $categoria = SeguridadCategoria::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }        
        $categoria->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
