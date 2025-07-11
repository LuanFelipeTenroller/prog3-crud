<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'email', 'senha', 'papel', 'data_criacao'];

    protected $useTimestamps = true;
    protected $createdField  = 'data_criacao';
    protected $updatedField  = '';

    protected $validationRules = [
        'nome'       => 'required|min_length[3]',
        'email'      => 'required|valid_email|is_unique[usuario.email]',
        'senha'      => 'required',
        'papel'      => 'in_list[comum,admin]',
    ];
}
