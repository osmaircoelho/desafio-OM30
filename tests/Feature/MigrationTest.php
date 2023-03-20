<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/**
 * Migration Test
 * 1. Create migration
 * 2. Setup Columns
 * 3. Create Relationships and Indexes
 *
 * @package Tests\Feature
 */
class MigrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create Paciente Table
     *
     * @test
     */
    public function create_paciente_table()
    {
        $this->assertTrue(
            Schema::hasTable('pacientes')
        );
    }
    /**
     * Create Endereco Table
     *
     * @test
     */
    public function create_endereco_table()
    {
        $this->assertTrue(
            Schema::hasTable('enderecos')
        );
    }

    /**
     * Add columns to table pacientes
     *
     * @test
     */
    public function create_columns_to_pacientes()
    {
        $this->assertTrue(
            Schema::hasColumns('pacientes', [
                'id',
                'nome_completo',
                'nome_mae',
                'data_nascimento',
                'cpf',
                'cns',
                'foto',
                'created_at',
                'updated_at',
            ])
        );
    }

    /**
     * Add columns to table Enderecos
     *
     * @test
     */
    public function create_columns_to_enderecos()
    {
        $this->assertTrue(
            Schema::hasColumns('enderecos', [
                'id',
                'endereco',
                'numero',
                'complemento',
                'bairro',
                'cidade',
                'estado',
                'cep',
                'paciente_id',
                'created_at',
                'updated_at',
            ])
        );
    }
}
