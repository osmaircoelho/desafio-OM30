<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Endereco;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto',
        'nome_completo',
        'nome_mae',
        'data_nascimento',
        'cpf',
        'cns',
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
