<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\ComentarioModel;

class ComentarioModelTest extends CIUnitTestCase
{
    public function testInstanciaModel()
    {
        $model = new ComentarioModel();
        $this->assertInstanceOf(ComentarioModel::class, $model);
    }

    public function testCamposPermitidos()
    {
        $model = new ComentarioModel();

        $esperado = ['usuario_id', 'planta_id', 'texto', 'data_criacao'];
        $this->assertEquals($esperado, $model->allowedFields);
    }

    public function testRegrasDeValidacao()
    {
        $model = new ComentarioModel();
        $regras = $model->getValidationRules();

        $this->assertArrayHasKey('usuario_id', $regras);
        $this->assertArrayHasKey('planta_id', $regras);
        $this->assertArrayHasKey('texto', $regras);

        $this->assertEquals('required|integer', $regras['usuario_id']);
        $this->assertEquals('required|integer', $regras['planta_id']);
        $this->assertEquals('required|min_length[3]', $regras['texto']);
    }
}
