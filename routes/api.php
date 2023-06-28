<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ConvocatoriaController as Convocatoria;
use App\Http\Controllers\Api\V1\Conv_baseController as Conv_base;
use App\Http\Controllers\Api\V1\EntrevistaController as Entrevista;
use App\Http\Controllers\Api\V1\Result_cvController as Result_cv;
use App\Http\Controllers\Api\V1\ResultadoController as Resultado;
use App\Http\Controllers\Api\V1\GestionController as Gestion;
use App\Http\Controllers\Api\V1\GestiondetalleController as Gestiondetalle;
use App\Http\Controllers\Api\V1\TipodedocumentoController as Tipodedocumento;
use App\Http\Controllers\Api\V1\DocumentonormativaController as Documentonormativa;
use App\Http\Controllers\Api\V1\SeguridadController as Seguridad;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/v1/convocatoria', Convocatoria::class);
Route::apiResource('/v1/bases', Conv_base::class);
Route::apiResource('/v1/entrevista', Entrevista::class);
Route::apiResource('/v1/result', Result_cv::class);
Route::apiResource('/v1/resultado', Resultado::class);
Route::apiResource('/v1/gestion', Gestion::class);
Route::apiResource('/v1/gestiondetalle', Gestiondetalle::class);
Route::apiResource('/v1/tipodedocumento', Tipodedocumento::class);
Route::apiResource('/v1/documentonormativa', Documentonormativa::class);
Route::apiResource('/v1/seguridad', Seguridad::class);

