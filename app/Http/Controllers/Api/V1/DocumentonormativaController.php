<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\ShowItemException;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DocumentonormativaCollection;
use App\Http\Resources\V1\DocumentonormativaResource;
use App\Models\Documentonormativa;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class DocumentonormativaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Documentonormativa::with('Tipodedocumento')->get();
        return DocumentonormativaCollection::make($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $documento = new Documentonormativa;
        $documento->nombre = $request->nombre;
        $documento->fecha =Carbon::now()->toDateString();
        $documento->descripcion = $request->descripcion;
        $documento->archivo = $request->archivo;
        $documento->tipodedocumento_id = $request->tipodedocumento_id;
        $documento->save();
        return response()->json($documento);
    }

    /**
     * Display the specified resource.
     */
    // public function show(Documentonormativa $documentonormativa)
    public function show($id): JsonResource
    {
        $documentos = Documentonormativa::where('id', $id)
            ->first();
        if (!$documentos) {
            return throw new ShowItemException();
        }
        return DocumentonormativaResource::make($documentos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $documento = Documentonormativa::find($id);
        if (!$documento) {
            return throw new ShowItemException();
        }
        $documento->nombre = $request->nombre;
        $documento->fecha = $request->fecha;
        $documento->descripcion = $request->descripcion;
        $documento->archivo = $request->archivo;
        $documento->tipodedocumento_id = $request->tipodedocumento_id;
        $documento->save();
        return response()->json($documento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datos = Documentonormativa::find($id);
        if (!$datos) {
            return throw new ShowItemException();
        }
        $datos->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}