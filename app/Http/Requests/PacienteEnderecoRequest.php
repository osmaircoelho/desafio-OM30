<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarCNS;

class PacienteEnderecoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_completo'   => 'required|string|max:255',
            'nome_mae'        => 'required|string|max:255',
            'data_nascimento' => 'required|date_format:Y-m-d',
            'cpf'             => 'required|string|max:11',
            'cns'             => ['required', new ValidarCNS()],
            'cep'             => 'required|string|max:8',
            'endereco'        => 'required|string|max:255',
            'numero'          => 'required|string|max:255',
            'complemento'     => 'nullable|string|max:255',
            'bairro'          => 'required|string|max:255',
            'cidade'          => 'required|string|max:255',
            'estado'          => 'required|string|max:2',
            'foto'            => 'nullable|image|max:2048',
        ];
    }
}
