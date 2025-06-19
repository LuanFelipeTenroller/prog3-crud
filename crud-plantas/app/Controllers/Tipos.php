<?php

namespace App\Controllers;

use App\Models\TipoModel;
use CodeIgniter\Controller;

class Tipos extends Controller
{
    public function index()
    {
        $model = new TipoModel();
        $data['tipos'] = $model->orderBy('nome', 'ASC')->findAll();

        return view('tipos/index', $data);
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
}
