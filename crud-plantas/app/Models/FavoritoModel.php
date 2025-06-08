<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoritoModel extends Model
{
    protected $table      = 'favoritos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['usuario_id', 'planta_id', 'data_registro'];

    protected $useTimestamps = false;
    protected $createdField  = 'data_registro';

    protected $validationRules = [
        'usuario_id' => 'required|integer',
        'planta_id'  => 'required|integer',
    ];

    public function getFavoritosWithPlantas($usuarioId)
    {
        return $this->select('favoritos.*, plantas.nome as nome_planta, plantas.id as planta_id, favoritos.data_registro')
            ->join('plantas', 'plantas.id = favoritos.planta_id')
            ->where('favoritos.usuario_id', $usuarioId)
            ->orderBy('plantas.nome', 'ASC')
            ->findAll();
    }
}
