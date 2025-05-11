<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantaModel extends Model
{
    protected $table      = 'plantas';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'especie', 'descricao', 'cuidados', 'data_registro', 'tipo_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'data_registro';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nome'       => 'required|min_length[3]|max_length[100]',
        'especie'    => 'permit_empty|min_length[3]|max_length[100]',
        'descricao'  => 'permit_empty|string',
        'cuidados'   => 'permit_empty|string',
    ];

    public function getPlantaWithTipo($id)
    {
        return $this->select('plantas.*, tipos.nome as tipo_nome')
            ->join('tipos', 'tipos.id = plantas.tipo_id', 'left')
            ->where('plantas.id', $id)
            ->first();
    }
}
