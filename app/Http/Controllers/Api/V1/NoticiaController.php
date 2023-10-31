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

    /**
     * Store a newly created resource in storage.
     */
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
