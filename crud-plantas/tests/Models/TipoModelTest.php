<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\TipoModel;

class TipoModelTest extends CIUnitTestCase
{
    public function testInstanciaModel()
    {
        $model = new TipoModel();
        $this->assertInstanceOf(TipoModel::class, $model);
    }

    public function testCamposPermitidos()
    {
        $model = new TipoModel();
        $esperado = ['nome', 'descricao'];
        $this->assertEquals($esperado, $model->allowedFields);
    }

    public function testRegrasDeValidacao()
    {
        $model = new TipoModel();
        $regras = $model->getValidationRules();

        $this->assertArrayHasKey('nome', $regras);
        $this->assertEquals('required|min_length[3]|max_length[100]', $regras['nome']);

        $this->assertArrayHasKey('descricao', $regras);
        $this->assertEquals('permit_empty|string', $regras['descricao']);
    }
}
