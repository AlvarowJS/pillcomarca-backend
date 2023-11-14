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
use App\Http\Controllers\Api\V1\NoticiaCategoriaController as NoticiaCategoria;
use App\Http\Controllers\Api\V1\NoticiaController as Noticia;
use App\Http\Controllers\Api\V1\PortadaController as Portada;

use App\Http\Controllers\Api\AuthController;


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
Route::post('register-admin', [AuthController::class, 'registerAdmin']);
Route::post('register-user', [AuthController::class, 'registerUser']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/v1/convocatoria', Convocatoria::class);
    Route::apiResource('/v1/bases', Conv_base::class);
    Route::apiResource('/v1/entrevista', Entrevista::class);
    Route::apiResource('/v1/result', Result_cv::class);
    Route::apiResource('/v1/resultado', Resultado::class);
    Route::apiResource('/v1/gestion', Gestion::class);
    Route::apiResource('/v1/gestiondetalle', Gestiondetalle::class);
    Route::apiResource('/v1/tipodedocumento', Tipodedocumento::class);
    // Route::apiResource('/v1/documentonormativa', Documentonormativa::class);        

    // Rutas para portadas
    Route::apiResource('/v1/portada', Portada::class);
    Route::post('/v1/portada-update', [Portada::class, 'update_foto']);

    // Rutas para noticias
    Route::apiResource('/v1/noticia', Noticia::class);
    Route::apiResource('/v1/categoria-noticias', NoticiaCategoria::class);
    

    // Rutas de Archivos de Seguridad
    Route::post('/v1/seguridad-archivo', [Seguridad::class, 'crearArchivo']);
    Route::get('/v1/seguridad-archivo', [Seguridad::class, 'listarArchivos']);
    Route::put('/v1/seguridad-archivo/{id}', [Seguridad::class, 'actualizarArchivo']);
    Route::delete('/v1/seguridad-archivo/{id}', [Seguridad::class, 'eliminarArchivo']);

    // Rutas de Coleciones de Seguridad
    Route::post('/v1/seguridad-coleccion', [Seguridad::class, 'crearColeccion']);
    Route::get('/v1/seguridad-coleccion', [Seguridad::class, 'listarColeccion']);
    Route::put('/v1/seguridad-coleccion/{id}', [Seguridad::class, 'actualizarColeccion']);
    Route::delete('/v1/seguridad-coleccion/{id}', [Seguridad::class, 'eliminarColeccion']);

    // Rutas de cateogorias de Seguridad
    Route::post('/v1/seguridad-categoria', [Seguridad::class, 'crearCategoria']);
    Route::get('/v1/seguridad-categoria', [Seguridad::class, 'listarCategoria']);
    Route::put('/v1/seguridad-categoria/{id}', [Seguridad::class, 'actualizarCategoria']);
    Route::delete('/v1/seguridad-categoria/{id}', [Seguridad::class, 'eliminarCategoria']);



});

Route::get('/v1/seguridad', [Seguridad::class, 'index']);
Route::get('/v1/noticia', [Noticia::class, 'index']);
Route::get('/v1/noticias/{id}', [Noticia::class, 'show']);
Route::get('/v1/convocatoria', [Convocatoria::class, 'index']);
Route::get('/v1/gestion', [Gestion::class, 'index']);
Route::get('/v1/tipodedocumento', [Tipodedocumento::class, 'index']);
Route::get('/v1/documentonormativa', [Documentonormativa::class, 'index']);
Route::get('/v1/documentonormativa/{documentonormativa}', [Documentonormativa::class, 'show']);
Route::get('/v1/portada', [Portada::class, 'index']);
