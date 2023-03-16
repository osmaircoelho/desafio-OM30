<?php

namespace App\Jobs;

use App\Models\Endereco;
use App\Models\Paciente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProcessarImportacaoPacientes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $arquivo;

    public function __construct($arquivo)
    {
        $this->arquivo = $arquivo;
    }

    public function handle()
    {
        DB::beginTransaction();

        try {
            $reader = Reader::createFromPath($this->arquivo->path(), 'r');
            $reader->setHeaderOffset(0);

            $registros = $reader->getRecords();

            foreach ($registros as $registro) {
                // validar e processar cada registro
                $paciente = new Paciente();
                $paciente->nome_completo = $registro['nome_completo'];
                $paciente->nome_mae = $registro['nome_mae'];
                $paciente->data_nascimento = $registro['data_nascimento'];
                $paciente->cpf = $registro['cpf'];
                $paciente->cns = $registro['cns'];

                // Cadastrar o paciente e seu endereço
                $endereco = new Endereco();
                $endereco->endereco = $registro['endereco'];
                $endereco->numero = $registro['numero'];
                $endereco->complemento = $registro['complemento'];
                $endereco->bairro = $registro['bairro'];
                $endereco->cidade = $registro['cidade'];
                $endereco->estado = $registro['estado'];
                $endereco->cep = $registro['cep'];

                $paciente->endereco()->create($endereco);
                $paciente->save();

                /* DB::transaction(function () use ($paciente, $endereco){
                    $endereco->save();
                    $paciente->endereco()->associate($endereco);
                    $paciente->save();
                 });*/
            } //foreach
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage() . " - LINE " . $e->getLine());
        }

    }
}
