<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Directorio;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    public function indexSimple()
    {
        $directorio = Directorio::all();
        return response()->json($directorio);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = \Request::query('perPage', 9);
        $datos = Directorio::paginate($perPage);
        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carpeta = "directorio";
        $ruta = public_path($carpeta);
        if (!\File::isDirectory($ruta)) {
            $publicPath = 'storage/' . $carpeta;
            \File::makeDirectory($publicPath, 0777, true, true);
        }
        $files = $request->file('foto');

        $directorio = new Directorio;

        if ($request->hasFile('foto')) {

            $nombre = uniqid() . '.' . $files->getClientOriginalName();
            $path = $carpeta . '/' . $nombre;
            \Storage::disk('public')->put($path, \File::get($files));
            $directorio->foto = $nombre;
        }

        $directorio->nombres = $request->nombres;
        $directorio->apellidos = $request->apellidos;
        $directorio->correo = $request->correo;
        $directorio->cel = $request->cel;
        $directorio->cargo = $request->cargo;
        $directorio->dependencia = $request->dependencia;
        // $directorio->foto = $request->foto;
        $directorio->save();

        return response()->json([
            'message' => 'Usuario creado exitosamente.',
            'directorio' => $directorio,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datos = Directorio::find($id);
        if (!$datos) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateFoto(Request $request)
    {
        $carpeta = "directorio";
        $id = $request->id;
        $directorio = Directorio::find($id);

        // Actualizar asesor
        if (!$directorio) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        if ($request->hasFile('foto')) {
            $nombreArchivo = $directorio->foto;
            $files = $request->file('foto');

            \Storage::disk('public')->delete($carpeta . '/' . $nombreArchivo);
            $nombreNuevo = uniqid() . '.' . $files->getClientOriginalName();
            $pathNuevo = $carpeta . '/' . $nombreNuevo;
            \Storage::disk('public')->put($pathNuevo, \File::get($files));
            $directorio->foto = $nombreNuevo;

        }
        $directorio->nombres = $request->nombres;
        $directorio->apellidos = $request->apellidos;
        $directorio->correo = $request->correo;
        $directorio->cel = $request->cel;
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
        $directorio = Directorio::findOrFail($id);

        if (!$directorio) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $fotoBorrar = $directorio->foto;
        $carpeta = 'directorio';
        $pathBorrar = $carpeta . '/' . $fotoBorrar;
        \Storage::disk('public')->delete($pathBorrar);

        $directorio->delete();
        return response()->json($directorio);
    }
}
