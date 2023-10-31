<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\NoticiaCategoria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoticiaCategoriaController extends Controller
{

    public function index()
    {
        $categorias = NoticiaCategoria::all();

        if ($categorias->isEmpty()) {
            return response()->json(['message' => 'No se encontraron categorías de noticias'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($categorias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string'
        ]);

        $categoria = NoticiaCategoria::create([
            'nombre_categoria' => $request->nombre_categoria
        ]);

        return response()->json($categoria, Response::HTTP_CREATED);
    }

    public function show($id)
    {

        $datos = NoticiaCategoria::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($datos);
    }

    public function update(Request $request, $id)
    {
        $noticia = NoticiaCategoria::find($id);
        if (!$noticia) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $noticia->nombre_categoria = $request->nombre_categoria;
        $noticia->save();
        return response()->json($noticia);

    }

    public function destroy($id)
    {
        $datos = NoticiaCategoria::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
