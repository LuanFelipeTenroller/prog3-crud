<?php

namespace App\Controllers;

use App\Models\ComentarioModel;
use CodeIgniter\RESTful\ResourceController;

class ComentarioController extends ResourceController
{
    protected $modelName = 'App\Models\ComentarioModel';
    protected $format    = 'json';

    public function comentar($planta_id)
    {
        $key = getenv('JWT_SECRET') ?: 'SUA_CHAVE_SECRETA';
        $jwt = $this->request->getCookie('token');
        $usuario_id = 0;
        if ($jwt) {
            try {
                $decoded = \Firebase\JWT\JWT::decode($jwt, new \Firebase\JWT\Key($key, 'HS256'));
                $usuario_id = isset($decoded->sub) ? (int)$decoded->sub : 0;
            } catch (\Exception $e) {
                $usuario_id = 0;
            }
        }

        $comentario = $this->request->getPost('comentario');
        if ($usuario_id && $comentario) {
            $comentarioModel = new \App\Models\ComentarioModel();
            $comentarioModel->save([
                'planta_id' => $planta_id,
                'usuario_id' => $usuario_id,
                'texto' => $comentario
            ]);
        }
        return redirect()->to('/plantas/view/' . $planta_id);
    }

    public function porPlanta($plantaId)
    {
        return $this->respond(
            $this->model->getComentariosByPlanta($plantaId)
        );
    }
}
