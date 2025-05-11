<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoritoModel extends Model
{
    protected $table      = 'favoritos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['planta_id', 'data_registro', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'data_registro';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
    'planta_id' => 'required|integer',
];

public function getFavoritosWithPlantas()
{
    return $this->select('favoritos.*, plantas.nome AS nome_planta')
                ->join('plantas', 'plantas.id = favoritos.planta_id')
                ->findAll();
}


}
