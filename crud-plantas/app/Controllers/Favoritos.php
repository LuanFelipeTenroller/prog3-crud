<?php

namespace App\Controllers;

use App\Models\FavoritoModel;
use App\Models\PlantaModel;
use CodeIgniter\Controller;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Favoritos extends Controller
{
        public function index()
    {
        $usuarioId = 0;
        $key = getenv('JWT_SECRET') ?: 'SUA_CHAVE_SECRETA';

        $jwt = $this->request->getCookie('token');
        if (!$jwt) {
            $authHeader = $this->request->getHeaderLine('Authorization');
            if ($authHeader && preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
                $jwt = $matches[1];
            }
        }

        if ($jwt) {
            try {
                $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
                $usuarioId = isset($decoded->sub) ? (int)$decoded->sub : 0;
            } catch (\Exception $e) {
                $usuarioId = 0;
            }
        }

        $model = new FavoritoModel();
        $favoritos = $model->getFavoritosWithPlantas($usuarioId);

        $data['favoritos'] = $favoritos;

        return view('favoritos/index', $data);
    }

    public function store($plantaId)
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            return $this->response->setStatusCode(401)->setJSON(['error' => 'Token ausente']);
        }
        $jwt = $matches[1];
        $key = getenv('JWT_SECRET') ?: 'SUA_CHAVE_SECRETA';

        try {
            $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
            $usuarioId = $decoded->sub;
        } catch (\Exception $e) {
            return $this->response->setStatusCode(401)->setJSON(['error' => 'Token inválido']);
        }

        $favoritoModel = new FavoritoModel();

        $existe = $favoritoModel->where([
            'usuario_id' => $usuarioId,
            'planta_id' => $plantaId
        ])->first();

        if ($existe) {
            $favoritoModel->delete($existe['id']);
            return $this->response->setJSON(['success' => true, 'favorito' => false, 'message' => 'Favorito removido']);
        } else {
            $favoritoModel->insert([
                'usuario_id' => $usuarioId,
                'planta_id' => $plantaId
            ]);
            return $this->response->setJSON(['success' => true, 'favorito' => true, 'message' => 'Planta favoritada!']);
        }
    }


    public function delete($id)
    {
        $model = new FavoritoModel();
        $model->delete($id);

        return redirect()->to('/favoritos');
    }
}
