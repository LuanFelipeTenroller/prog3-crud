<?php

namespace App\Controllers;

use App\Models\FavoritoModel;
use App\Models\PlantaModel;
use CodeIgniter\Controller;

class Favoritos extends Controller
{
    public function index()
    {
        $model = new FavoritoModel();
        $data['favoritos'] = $model->getFavoritosWithPlantas();

        return view('favoritos/index', $data);
    }

    public function store($planta_id)
    {
        $model = new FavoritoModel();

        $data = [
            'planta_id' => $planta_id
        ];

        $model->save($data);

        return redirect()->to('/favoritos');
    }


    public function delete($id)
    {
        $model = new FavoritoModel();
        $model->delete($id);

        return redirect()->to('/favoritos');
    }
}
