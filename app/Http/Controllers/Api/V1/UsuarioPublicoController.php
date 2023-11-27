<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\RegistroVisita;
use App\Models\UsuarioPublico;
use Illuminate\Http\Request;

class UsuarioPublicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UsuarioPublico::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuarioPublico = new UsuarioPublico();
        $usuarioPublico->nombre = $request->nombre;
        $usuarioPublico->apellidos = $request->apellidos;
        $usuarioPublico->dni = $request->dni;
        $usuarioPublico->save();
    }
    public function registroVisitaUsuario(Request $request) 
    {
        $usuarioPublico = new UsuarioPublico();
        $usuarioPublico->nombre = $request->nombre;
        $usuarioPublico->apellidos = $request->apellidos;
        $usuarioPublico->dni = $request->dni;
        $usuarioPublico->persona = $request->persona;
        $usuarioPublico->save();
        $idUsuarioPublico = $usuarioPublico->id;

        $visita = new RegistroVisita();
        $visita->fecha = $request->fecha;
        $visita->hora_ingreso = $request->hora_ingreso;
        $visita->hora_salida = $request->hora_salida;
        $visita->asunto = $request->asunto;
        $visita->user_id = $request->user_id;
        $visita->usuario_publico_id = $idUsuarioPublico;
        $visita->depedencia_id = $request->depedencia_id;
        $visita->save();
        return response()->json([
            "usuario"=> $usuarioPublico,
            "visitas"=> $visita
        ] ,200);
    }
    /**
     * Display the specified resource.
     */
    public function show($dni)
    {
        // Buscar el registro por el DNI
        $registro = UsuarioPublico::where('dni', $dni)->first();
    
        // Verificar si se encontró el registro
        if (!$registro) {
            return response()->json(['error' => 'No se encontró el registro'], 404);
        }
    
        // Retornar los datos encontrados
        return response()->json($registro, 200);
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
