<?php

namespace Database\Factories;

use App\Models\Paciente;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
            'nome_completo' => $this->faker->name(),
            'nome_mae' => $this->faker->name('female'),
            'data_nascimento' => $this->faker->date(),
            'cpf' => $this->faker->numerify('###########'),
            'cns' => $this->faker->numerify('##############'),
            //'foto' => $this->image('public/storage/photos', 400, 300, null, false),
            'foto' => $this->faker->imageUrl(),
        ];


    }

    /*public function configure()
    {
        return $this->afterCreating(function (Paciente $paciente) {
            $paciente->endereco()->save(Endereco::factory()->make());
        });
    }*/
}
