<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoritoModel extends Model
{
    protected $table      = 'favorito';
    protected $primaryKey = 'id';

    protected $allowedFields = ['usuario_id', 'planta_id', 'data_registro'];

    protected $useTimestamps = true;
    protected $createdField  = 'data_registro';
    protected $updatedField  = '';

    protected $validationRules = [
        'usuario_id' => 'required|integer',
        'planta_id'  => 'required|integer',
    ];

    public function getFavoritosWithPlantas($usuarioId)
    {
        return $this->select('favorito.*, planta.nome as nome_planta, planta.id as planta_id, favorito.data_registro')
            ->join('planta', 'planta.id = favorito.planta_id')
            ->where('favorito.usuario_id', $usuarioId)
            ->orderBy('planta.nome', 'ASC')
            ->findAll();
    }
}
