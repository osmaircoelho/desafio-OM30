<?php

namespace Database\Seeders;

use App\Models\Endereco;
use App\Models\Paciente;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    public function run()
    {
        Paciente::factory()->count(10)->create()->each(function ($paciente) {
            $endereco = Endereco::factory()->make();
            $paciente->endereco()->save($endereco);
        });
    }
}
