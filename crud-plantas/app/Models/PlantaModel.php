<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantaModel extends Model
{
    protected $table      = 'planta';
    protected $primaryKey = 'id';

protected $allowedFields = ['nome', 'especie', 'descricao', 'cuidados', 'data_registro', 'tipo_id', 'imagem', 'usuario_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'data_registro';
    protected $updatedField  = '';

    protected $validationRules = [
        'nome'       => 'required|min_length[3]|max_length[100]',
        'especie'    => 'permit_empty|min_length[3]|max_length[100]',
        'descricao'  => 'permit_empty|string',
        'cuidados'   => 'permit_empty|string',
        'usuario_id' => 'required|integer',
        'imagem'    => 'permit_empty|string',
    ];

    public function getPlantaWithTipo($id)
    {
        return $this->select('planta.*, tipos.nome as tipo_nome')
            ->join('tipos', 'tipos.id = planta.tipo_id', 'left')
            ->where('planta.id', $id)
            ->first();
    }

public function getPlantasComFavorito($usuario_id)
    {
        $builder = $this->db->table('planta p')
        ->select('p.id, p.nome, p.especie, p.descricao, p.cuidados, p.data_registro, p.tipo_id, p.usuario_id as usuario_cadastro_id, IF(f.usuario_id IS NOT NULL, 1, 0) as favorito, p.imagem')
        ->join('favorito f', 'p.id = f.planta_id AND f.usuario_id = ' . (int)$usuario_id, 'left')
        ->orderBy('p.nome', 'ASC');
        
        $query = $builder->get();

        $result = $query->getResultArray();

        return $result;
    }
}
