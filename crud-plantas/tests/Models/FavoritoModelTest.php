<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\FavoritoModel;

class FavoritoModelTest extends CIUnitTestCase
{
    public function testInstanciaModel()
    {
        $model = new FavoritoModel();
        $this->assertInstanceOf(FavoritoModel::class, $model);
    }

    public function testCamposPermitidos()
    {
        $model = new FavoritoModel();

        $esperado = ['usuario_id', 'planta_id', 'data_registro'];
        $this->assertEquals($esperado, $model->allowedFields);
    }

    public function testRegrasDeValidacao()
    {
        $model = new FavoritoModel();
        $regras = $model->getValidationRules();

        $this->assertArrayHasKey('usuario_id', $regras);
        $this->assertArrayHasKey('planta_id', $regras);

        $this->assertEquals('required|integer', $regras['usuario_id']);
        $this->assertEquals('required|integer', $regras['planta_id']);
    }
}
