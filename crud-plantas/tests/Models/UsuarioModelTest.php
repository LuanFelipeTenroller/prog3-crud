<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\UsuarioModel;

class UsuarioModelTest extends CIUnitTestCase
{
    public function testInstanciaModel()
    {
        $model = new UsuarioModel();
        $this->assertInstanceOf(UsuarioModel::class, $model);
    }

    public function testCamposPermitidos()
    {
        $model = new UsuarioModel();
        $esperado = ['nome', 'email', 'senha', 'papel', 'data_criacao'];
        $this->assertEquals($esperado, $model->allowedFields);
    }

    public function testRegrasDeValidacao()
    {
        $model = new UsuarioModel();
        $regras = $model->getValidationRules();

        $this->assertArrayHasKey('email', $regras);
        $this->assertEquals('required|valid_email|is_unique[usuario.email]', $regras['email']);
    }
}
