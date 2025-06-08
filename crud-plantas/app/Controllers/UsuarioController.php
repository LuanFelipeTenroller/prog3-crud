<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;

class UsuarioController extends ResourceController
{
    protected $modelName = 'App\Models\UsuarioModel';
    protected $format    = 'json';

    public function create()
{
    try {
        $data = $this->request->getJSON(true);

        if (!isset($data['nome'], $data['email'], $data['senha'])) {
            return $this->failValidationErrors('Nome, email e senha são obrigatórios.');
        }

        $data['papel'] = 'comum';
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated(['message' => 'Usuário criado com sucesso!']);
    } catch (\Throwable $e) {
        return $this->failServerError($e->getMessage());
    }
}

    public function perfil()
    {
        $usuario = service('request')->usuario_autenticado ?? null;


        return view('perfil/index', ['usuario' => $usuario]);
    }

}
