<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\PlantaModel;

class PlantaModelTest extends CIUnitTestCase
{
    public function testInstanciaModel()
    {
        $model = new PlantaModel();
        $this->assertInstanceOf(PlantaModel::class, $model);
    }

    public function testCamposPermitidos()
    {
        $model = new PlantaModel();

        $esperado = [
            'nome', 'especie', 'descricao', 'cuidados',
            'data_registro', 'tipo_id', 'imagem', 'usuario_id'
        ];

        $this->assertEquals($esperado, $model->allowedFields);
    }

    public function testRegrasDeValidacao()
    {
        $model = new PlantaModel();
        $regras = $model->getValidationRules();

        $this->assertArrayHasKey('nome', $regras);
        $this->assertArrayHasKey('usuario_id', $regras);

        $this->assertEquals('required|integer', $regras['usuario_id']);
        $this->assertStringContainsString('required', $regras['nome']);
    }
}
