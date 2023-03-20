<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Models Test
 * 1. Create model Pacientes
 * 2. Create model Endereco
 * @package Tests\Feature\Exam
 */
class ModelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Create Paciente Model
     *
     * @test
     */
    public function create_model_paciente()
    {
        $this->assertTrue(class_exists('App\Models\Paciente'));
    }

    /**
     * Create Paciente Model
     *
     * @test
     */
    public function create_model_endereco()
    {
       $this->assertTrue(class_exists('App\Models\Endereco'));
    }
}
