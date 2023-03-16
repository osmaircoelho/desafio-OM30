<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|JsonResponse
     */
    public function buscarEndereco($cep)
    {
        $endereco = Cache::remember("endereco_{$cep}", 60 * 60 * 24, function() use ($cep) {
            $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
            return $response->json();
        });
        if(isset($endereco['erro'])){
            return response()->json(['error' => 'CEP não encontrado'], Response::HTTP_NOT_FOUND); // 404
        }
        return response()->json([$endereco]);
    }
}
