<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\UserController;

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


Route::get('/contato', [ContatoController::class, 'indexApi']);

Route::post('/contato', [ContatoController::class, 'storeApi']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/perfil', [UserController::class, 'perfilApi']);
    Route::post('/user/perfil', [UserController::class, 'atualizarPerfilApi']);
    Route::get('/users', [UserController::class, 'indexApi']);
});
