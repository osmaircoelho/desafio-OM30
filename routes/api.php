<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\EnderecoController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pacientes', [PacienteController::class, 'index']);
Route::get('/pacientes/{id}', [PacienteController::class, 'show']);
Route::post('/pacientes', [PacienteController::class, 'store']);
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy']);
Route::put('/pacientes/{id}', [PacienteController::class, 'update']);

Route::get('/endereco/{cep}', [EnderecoController::class, 'buscarEndereco']);
Route::post('/pacientes/importar', [PacienteController::class,'importar']);

