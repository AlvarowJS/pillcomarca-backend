<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Portada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portadasActivas = Portada::where('estado', true)->get();
        return response()->json($portadasActivas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Creara la carpeta si es necesario donde las iamgenes de portada
        $carpeta = 'fotosPortada';
        $ruta = public_path($carpeta);
        if (!\File::isDirectory($ruta)) {
            $publicpath = 'storage/' . $carpeta;
            \FIle::makeDirectory($publicpath, 0777, true, true);
        }

        $portada = new Portada;
        $portada->nombre_portada = $request->nombre_portada;

        $imagen = $request->file('foto');

        if ($request->hasFile('foto')) {
            $nombre = uniqid() . '.' . $imagen->getClientOriginalName();
            $path = $carpeta . '/' . $nombre;
            \Storage::disk('public')->put($path, \File::get($imagen));
            $portada->foto = $nombre;
        }

        $portada->estado = $request->estado;
        $portada->user_id = $request->user_id;
        $portada->save();

        return response()->json(['mensaje' => 'Portada creada exitosamente', 'data' => $portada], 201);
    }
    public function show($id)
    {
        $datos = Portada::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 201);
        }
        return response()->json($datos);
    }
    public function update_foto(Request $request)
    {
        $id = $request->id;
        $portada = Portada::find($id);

        if (!$portada) {
            return response()->json(['error' => 'Portada no encontrada'], 404);
        }

        $portada->nombre_portada = $request->nombre_portada;

        if ($request->hasFile('foto')) {
            // Elimina la imagen antigua si existe
            if ($portada->foto) {
                \Storage::disk('public')->delete('fotosPortada/' . $portada->foto);
            }

            // Sube la nueva imagen
            $imagen = $request->file('foto');
            $nombre = uniqid() . '.' . $imagen->getClientOriginalName();
            $path = 'fotosPortada/' . $nombre;
            \Storage::disk('public')->put($path, \File::get($imagen));
            $portada->foto = $nombre;
        }

        $portada->estado = $request->estado;
        $portada->user_id = $request->user_id;
        $portada->save();

        return response()->json(['mensaje' => 'Portada actualizada exitosamente', 'data' => $portada], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $portada = Portada::find($id);

        if (!$portada) {
            return response()->json(['error' => 'Portada no encontrada'], 404);
        }

        // Elimina la imagen asociada si existe
        if ($portada->foto) {
            \Storage::disk('public')->delete('fotosPortada/' . $portada->foto);
        }

        $portada->delete();

        return response()->json(['mensaje' => 'Portada eliminada exitosamente'], 200);

    }
}
