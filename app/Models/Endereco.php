<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cep',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
