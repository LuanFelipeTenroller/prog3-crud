<?php

namespace App\Models;

use CodeIgniter\Model;

class ComentarioModel extends Model
{
    protected $table      = 'comentario';
    protected $primaryKey = 'id';

    protected $allowedFields = ['usuario_id', 'planta_id', 'texto', 'data_criacao'];

    protected $useTimestamps = false;

    protected $validationRules = [
        'usuario_id' => 'required|integer',
        'planta_id'  => 'required|integer',
        'texto'      => 'required|min_length[3]',
    ];

    public function getComentariosByPlanta($plantaId)
    {
        return $this->select('comentario.*, usuario.nome AS nome_usuario')
                    ->join('usuario', 'usuario.id = comentario.usuario_id')
                    ->where('comentario.planta_id', $plantaId)
                    ->orderBy('comentario.data_criacao', 'ASC')
                    ->findAll();
    }
}
