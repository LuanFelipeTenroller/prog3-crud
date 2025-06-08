<?php

namespace App\Models;

use CodeIgniter\Model;

class ComentarioModel extends Model
{
    protected $table      = 'comentarios';
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
        return $this->select('comentarios.*, usuarios.nome AS nome_usuario')
                    ->join('usuarios', 'usuarios.id = comentarios.usuario_id')
                    ->where('comentarios.planta_id', $plantaId)
                    ->orderBy('comentarios.data_criacao', 'DESC')
                    ->findAll();
    }
}
