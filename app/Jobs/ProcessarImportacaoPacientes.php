<?php

namespace App\Jobs;

use App\Models\Endereco;
use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

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
        //ler e processar arquivo csv/txt
    }

    public function failed(Exception $exception)
    {
        Log::error($exception->getMessage() ." - LINE: " . $exception->getLine());
    }
}
