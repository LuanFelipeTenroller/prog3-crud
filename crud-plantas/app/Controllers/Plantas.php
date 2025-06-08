<?php

namespace App\Controllers;

use App\Models\PlantaModel;
use App\Models\TipoModel;
use CodeIgniter\Controller;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Plantas extends Controller
{
public function index()
{
    $usuario_id = 0;
    $key = getenv('JWT_SECRET') ?: 'SUA_CHAVE_SECRETA';

    $jwt = $this->request->getCookie('token'); 

    if ($jwt) {
        try {
            $decoded = \Firebase\JWT\JWT::decode($jwt, new \Firebase\JWT\Key($key, 'HS256'));
            $usuario_id = isset($decoded->sub) ? (int)$decoded->sub : 0;
        } catch (\Exception $e) {
        }
    }

    $model = new \App\Models\PlantaModel();
    $plantas = $model->getPlantasComFavorito($usuario_id);

    foreach ($plantas as &$planta) {
        $planta['favorito'] = (bool)$planta['favorito'];
    }

    $data['plantas'] = $plantas;
    $data['usuario_logado_id'] = $usuario_id;

    return view('plantas/index', $data);
}


    public function view($id)
    {

        $usuario_id = 0;
        $key = getenv('JWT_SECRET') ?: 'SUA_CHAVE_SECRETA';

        $jwt = $this->request->getCookie('token'); 

        if ($jwt) {
            try {
                $decoded = \Firebase\JWT\JWT::decode($jwt, new \Firebase\JWT\Key($key, 'HS256'));
                $usuario_id = isset($decoded->sub) ? (int)$decoded->sub : 0;
            } catch (\Exception $e) {
            }
        }

        $model = new PlantaModel();
        $data['planta'] = $model->getPlantaWithTipo($id);
        $data['usuario_logado_id'] = $usuario_id;

        $comentarioModel = new \App\Models\ComentarioModel();
        $data['comentarios'] = $comentarioModel->getComentariosByPlanta($id);

        return view('plantas/view', $data);
    }

    public function create()
    {
        $tipoModel = new TipoModel();
        $data['tipos'] = $tipoModel->findAll();

        return view('plantas/create', $data);
    }
    
    public function store()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            return $this->response->setStatusCode(401)->setJSON(['error' => 'Token ausente']);
        }

        $jwt = $matches[1];
        $key = getenv('JWT_SECRET') ?: 'SUA_CHAVE_SECRETA';

        try {
            $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
            $usuario_id = $decoded->sub;
        } catch (\Exception $e) {
            return $this->response->setStatusCode(401)->setJSON(['error' => 'Token inválido']);
        }

        $imagem = $this->request->getFile('imagem');
        $nomeImagem = null;

        if ($imagem && $imagem->isValid() && !$imagem->hasMoved()) {
            $nomeImagem = $imagem->getRandomName();
            $imagem->move(ROOTPATH . 'public/uploads', $nomeImagem);
        }

        $model = new PlantaModel();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'especie' => $this->request->getPost('especie'),
            'descricao' => $this->request->getPost('descricao'),
            'cuidados' => $this->request->getPost('cuidados'),
            'tipo_id' => $this->request->getPost('tipo_id'),
            'usuario_id' => $usuario_id,
            'imagem' => $nomeImagem,
        ];

        if (!$model->save($data)) {
            return $this->response->setStatusCode(400)->setJSON(['error' => $model->errors()]);
        }

        return $this->response->setJSON(['success' => true]);
    }


    public function edit($id)
{
    $model = new PlantaModel();
    $tipoModel = new TipoModel();

    $data['planta'] = $model->find($id);
    $data['tipos'] = $tipoModel->findAll();

    return view('plantas/edit', $data);
}

    public function update($id)
    {
        $model = new PlantaModel();
        $plantaAtual = $model->find($id);

        $imagem = $this->request->getFile('imagem');
        $nomeImagem = $plantaAtual['imagem']; 

        if ($imagem && $imagem->isValid() && !$imagem->hasMoved()) {
            if (!empty($plantaAtual['imagem'])) {
                $caminhoAntigo = ROOTPATH . 'public/uploads/' . $plantaAtual['imagem'];
                if (file_exists($caminhoAntigo)) {
                    unlink($caminhoAntigo);
                }
            }
            $nomeImagem = $imagem->getRandomName();
            $imagem->move(ROOTPATH . 'public/uploads', $nomeImagem);
        }

        $data = [
            'nome' => $this->request->getPost('nome'),
            'especie' => $this->request->getPost('especie'),
            'descricao' => $this->request->getPost('descricao'),
            'cuidados' => $this->request->getPost('cuidados'),
            'tipo_id' => $this->request->getPost('tipo_id'),
            'imagem' => $nomeImagem,
        ];

        $model->update($id, $data);

        return redirect()->to('/plantas');
    }

    public function delete($id)
    {
        $model = new PlantaModel();
        $model->delete($id);

        return redirect()->to('/plantas');
    }

    public function listarComFavoritos()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        $usuario_id = null;

        if ($authHeader && preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $jwt = $matches[1];
            $key = getenv('JWT_SECRET') ?: 'SUA_CHAVE_SECRETA';

            try {
                $decoded = \Firebase\JWT\JWT::decode($jwt, new \Firebase\JWT\Key($key, 'HS256'));
                $usuario_id = $decoded->sub;
            } catch (\Exception $e) {
                return $this->response->setStatusCode(401)->setJSON(['error' => 'Token inválido']);
            }
        } else {
            return $this->response->setStatusCode(401)->setJSON(['error' => 'Token ausente']);
        }

        $model = new \App\Models\PlantaModel();
        $plantas = $model->getPlantasComFavorito($usuario_id);

        return $this->response->setJSON($plantas);
    }

}
