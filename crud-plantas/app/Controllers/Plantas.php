<?php

namespace App\Controllers;

use App\Models\PlantaModel;
use App\Models\TipoModel;
use CodeIgniter\Controller;

class Plantas extends Controller
{
    public function index()
    {
        $model = new PlantaModel();
        $data['plantas'] = $model->findAll();
        
        return view('plantas/index', $data);
    }

    public function view($id)
    {
        $model = new PlantaModel();
        $data['planta'] = $model->getPlantaWithTipo($id);

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
        $model = new PlantaModel();
        
        $data = [
            'nome' => $this->request->getPost('nome'),
            'especie' => $this->request->getPost('especie'),
            'descricao' => $this->request->getPost('descricao'),
            'cuidados' => $this->request->getPost('cuidados'),
            'tipo_id' => $this->request->getPost('tipo_id'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        
        $model->save($data);
        
        return redirect()->to('/plantas');
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

        $data = [
            'nome' => $this->request->getPost('nome'),
            'especie' => $this->request->getPost('especie'),
            'descricao' => $this->request->getPost('descricao'),
            'cuidados' => $this->request->getPost('cuidados'),
            'tipo_id' => $this->request->getPost('tipo_id')
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
}
