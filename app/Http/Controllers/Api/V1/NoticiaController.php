<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\NoticiaImagenes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoticiaController extends Controller
{
    // Publico
    public function index()
    {
        $datos = Noticia::with('noticiaImagenes', 'categoria', 'user')->get();
        return response()->json($datos);
    }

    public function subirFoto(Request $request)
    {

    }
    public function actualizarFoto(Request $request)
    {

    }
    public function store(Request $request)
    {
        
        
        $noticia = new Noticia;
        $noticia->titulo = $request->titulo;
        $noticia->fecha = $request->fecha;
        $noticia->nota = $request->nota;
        $noticia->referencia = $request->referencia;
        $noticia->user_id = $request->user_id;
        $noticia->categoria_id = $request->categoria_id;
        $noticia->titulo = $request->titulo;
        $noticia->save();
        $noticiaID = $noticia->id;
        
        $imagenes = $request->input('imagen');
        foreach($imagenes as $imagen) {
            $foto = new NoticiaImagenes;
            $foto->imagen = $imagen;
            $foto->noticia_id = $noticiaID;
            $foto->save();
        }

        return response()->json($noticia, Response::HTTP_CREATED);
    

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $noticia = Noticia::find($id);        
        $noticia = Noticia::with('noticiaImagenes', 'categoria', 'user')->find($id);

        if(!$noticia) {
            return response()->json([
                'message' => 'Registro no encontrado', 404
            ]);
        }
        return response()->json($noticia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $noticia = Noticia::find($id);

        if (!$noticia) {
            return response()->json(['message' => 'Noticia no encontrada'], Response::HTTP_NOT_FOUND);
        }
    
        $noticia->titulo = $request->titulo ?? $noticia->titulo;
        $noticia->fecha = $request->fecha ?? $noticia->fecha;
        $noticia->nota = $request->nota ?? $noticia->nota;
        $noticia->referencia = $request->referencia ?? $noticia->referencia;
        $noticia->user_id = $request->user_id ?? $noticia->user_id;
        $noticia->categoria_id = $request->categoria_id ?? $noticia->categoria_id;
    
        $noticia->save();
    
        // Actualización de las imágenes
        $imagenes = $request->input('imagen');
        if ($imagenes) {
            // Elimina las imágenes existentes
            NoticiaImagenes::where('noticia_id', $id)->delete();
    
            foreach ($imagenes as $imagen) {
                $foto = new NoticiaImagenes;
                $foto->imagen = $imagen;
                $foto->noticia_id = $id;
                $foto->save();
            }
        }
    
        return response()->json($noticia, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);

        if (!$noticia) {
            return response()->json(['message' => 'Noticia no encontrada'], Response::HTTP_NOT_FOUND);
        }
    
    
        NoticiaImagenes::where('noticia_id', $id)->delete();
        $noticia->delete();
        return response()->json($noticia, Response::HTTP_OK);
    }
}
