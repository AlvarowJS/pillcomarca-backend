<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Dependencia;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    
    public function index()
    {
        $cargos = Cargo::all();
        return response()->json($cargos);
    }
    public function mostrarDependencias()
    {
        $dependencias = Dependencia::all();
        return response()->json($dependencias);
    }
    
}
