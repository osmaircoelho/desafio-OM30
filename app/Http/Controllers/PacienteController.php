<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Jobs\ProcessarImportacaoPacientes;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Paciente::query();

        if ($request->has('nome')) {
            $query->where('nome_completo', 'like', '%' . $request->nome . '%');
        }

        if ($request->has('cpf')) {
            $query->where('cpf', $request->cpf);
        }

        $pacientes = $query->get();

        return response()->json($pacientes);
    }

    public function show($id)
    {
        $paciente = Paciente::with('endereco')->find($id);

        return response()->json($paciente);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_completo' => 'required|string|max:255',
            'nome_mae' => 'required|string|max:255',
            'data_nascimento' => 'required|date_format:Y-m-d',
            'cpf' => 'required|string|max:11',
            'cns' => 'required|string|max:15',
            'cep' => 'required|string|max:8',
            'endereco' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'foto' => 'nullable|image|max:2048',
        ]);

        $endereco = Endereco::create([
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
        ]);

        $paciente = Paciente::create([
            'nome_completo' => $request->nome,
            'nome_mae' => $request->nome_mae,
            'data_nascimento' => $request->data_nascimento,
            'cpf' => $request->cpf,
            'cns' => $request->cns,
            'endereco_id' => $endereco->id,
        ]);

        if ($request->hasFile('foto')) {
            $paciente->foto = $request->file('foto')->store('public/fotos_pacientes');
            $paciente->save();
        }

        return response()->json($paciente);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome_completo' => 'nullable|string|max:255',
            'nome_mae' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|date',
            'cpf' => 'nullable|string|max:11|unique:pacientes,cpf,' . $id,
            'cns' => 'nullable|string|max:15|unique:pacientes,cns,' . $id,
            'endereco.cep' => 'nullable|string|max:255',
            'endereco.endereco' => 'nullable|string|max:255',
            'endereco.numero' => 'nullable|string|max:255',
            'endereco.complemento' => 'nullable|string|max:255',
            'endereco.bairro' => 'nullable|string|max:255',
            'endereco.cidade' => 'nullable|string|max:255',
            'endereco.estado' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response); //422
        }

        $paciente = Paciente::findOrFail($id);

        if ($request->has('endereco')) {
            $endereco = $paciente->endereco ?? new Endereco();
            $endereco->fill($request->endereco);
            $endereco->save();

            $paciente->endereco_id = $endereco->id;
        }

        $paciente->fill($request->except('endereco'));
        $paciente->save();

        return response()->json(['data' => $paciente->load('endereco')]);
    }
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $endereco = Endereco::findOrFail($paciente->id);

        $paciente->delete();
        $endereco->delete();

        return response()->json(['message' => 'Paciente excluído com sucesso']);
    }

    public function importar(Request $request)
    {
        $arquivo = $request->file('arquivo');

        if(!$arquivo){
            return response()->json(['error' => 'Arquivo nao enviado'], Response::HTTP_BAD_REQUEST); //400
        }

        ProcessarImportacaoPacientes::dispatch($arquivo);

        return response()->json(['message' => 'Importação iniciada com sucesso']);

    }

}
