<?php

namespace App\Controllers;

use App\Models\TipoModel;
use CodeIgniter\Controller;

class Tipos extends Controller
{
    public function index()
    {
        $model = new TipoModel();
        $data['tipos'] = $model->findAll();

        return view('tipos/index', $data);
    }

    public function create()
    {
        return view('tipos/create');
    }

    public function store()
    {
        $model = new TipoModel();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'descricao' => $this->request->getPost('descricao')
        ];

        $model->save($data);

        return redirect()->to('/tipos');
    }

    public function edit($id)
    {
        $model = new TipoModel();
        $data['tipo'] = $model->find($id);

        return view('tipos/edit', $data);
    }

    public function update($id)
    {
        $model = new TipoModel();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'descricao' => $this->request->getPost('descricao')
        ];

        $model->update($id, $data);

        return redirect()->to('/tipos');
    }

    public function delete($id)
    {
        $plantaModel = new \App\Models\PlantaModel();
        $tipoModel = new \App\Models\TipoModel();

        if ($plantaModel->where('tipo_id', $id)->countAllResults() > 0) {
            return redirect()->to('/tipos')
                            ->with('error', 'Não é possível excluir este tipo pois ele está associado a uma ou mais plantas.');
        }

        $tipoModel->delete($id);

        return redirect()->to('/tipos')
                        ->with('success', 'Tipo excluído com sucesso.');
}
}
