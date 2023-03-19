<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\EnderecoController;
use Illuminate\Validation\ValidationException;

# gera novo token
Route::post('/tokens/create', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    return $user->createToken('my_first_token')->plainTextToken;
});

Route::group(['middleware' => ['auth:sanctum']], function(){

    // Rotas Pacientes
    # Rota para consulta pelo nome ou CPF, caso os dois campos estejam vazios buscar todos os registros do banco Pacientes
    Route::get('/pacientes', [PacienteController::class, 'index']);

    # Obter dados de um unico paciente incluindo endereco
    Route::get('/paciente/{id}', [PacienteController::class, 'show']);

    # Rota adicionar um registro
    Route::post('/paciente', [PacienteController::class, 'store']);

    # Excluir um paciente pelo id
    Route::delete('/paciente/{id}', [PacienteController::class, 'destroy']);

    # Rota atualizar um registro
    Route::put('/paciente/{id}', [PacienteController::class, 'update']);

    # Rota para importar um registro .CSV File
    Route::post('/pacientes/importar', [PacienteController::class,'importar']);

    // Rotas Endereco
    Route::get('/endereco/{cep}', [EnderecoController::class, 'buscarEndereco']);

});
