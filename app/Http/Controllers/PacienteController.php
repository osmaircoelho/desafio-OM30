<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteEnderecoRequest;
use App\Models\Endereco;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Jobs\ProcessarImportacaoPacientes;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
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

        $pacientes = $query->paginate(15);

        return response()->json($pacientes);
    }

    public function show($id)
    {
        $paciente = Paciente::with('endereco')->find($id);

        return response()->json($paciente);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PacienteEnderecoRequest $request)
    {
        \DB::beginTransaction();
        $response['data'] = [];
        $response['status'] = Response::HTTP_CREATED;

        try{
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto')->store('public/fotos_pacientes');
            }
            // Inserindo o registro do paciente
            $paciente                  = new Paciente;
            $paciente->nome_completo   = $request->nome_completo;
            $paciente->nome_mae        = $request->nome_mae;
            $paciente->data_nascimento = $request->data_nascimento;
            $paciente->cpf             = $request->cpf;
            $paciente->cns             = $request->cns;
            $paciente->foto            = $foto ?? NULL;
            $paciente->save();

            // Inserir dados na tabela "enderecos"
            $endereco              = new Endereco;
            $endereco->endereco    = $request->endereco;
            $endereco->numero      = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->bairro      = $request->bairro;
            $endereco->cidade      = $request->cidade;
            $endereco->estado      = $request->estado;
            $endereco->cep         = $request->cep;
            $endereco->paciente_id = $paciente->id;
            $endereco->save();

            \DB::commit();

            return response()->json([
                'paciente' => $paciente,
                'endereco' => $paciente->endereco,
            ]);

        }catch(\Exception $exception){
            $response['data'] = $exception->getMessage();
            $response['status'] = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
        return response()->json([
            'data' => $response['data'],
            'status' => $response['status']
        ], $response['status']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PacienteEnderecoRequest $request, $id)
    {
        $paciente = Paciente::findOrFail($id);

        if ($request->hasFile('foto')) {
            $novaFoto = $request->file('foto')->store('public/fotos_pacientes');
            $novoCaminhoFoto = Storage::url($novaFoto);
            $paciente->foto = $novoCaminhoFoto;
        }

        $paciente->nome_completo = $request->nome_completo;
        $paciente->nome_mae = $request->nome_mae;
        $paciente->data_nascimento = $request->data_nascimento;
        $paciente->cpf = $request->cpf;
        $paciente->cns = $request->cns;
        $endereco = $paciente->endereco;

        $endereco->cep = $request->cep;
        $endereco->endereco = $request->endereco;
        $endereco->numero = $request->numero;
        $endereco->complemento = $request->complemento;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;

        $paciente->push();

        return response()->json([
            'paciente' => $paciente,
            'endereco' => $endereco,
        ]);
    }
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);

        $paciente->delete();

        return response()->json(['message' => 'Paciente excluído com sucesso']);
    }

    public function importar(Request $request)
    {

        $arquivoCsv = $request->file('arquivo_csv');

        if ($arquivoCsv) {
            $file_local = Storage::disk('local')->put('arquivo_csv', $arquivoCsv, 'public');
        }

        $jobId = Bus::dispatch(new ProcessarImportacaoPacientes($file_local));

        return response()->json(['job_id' => $jobId]);

    }

}
