<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoModel extends Model
{
    protected $table      = 'tipo';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'descricao'];

    protected $validationRules = [
        'nome'       => 'required|min_length[3]|max_length[100]',
        'descricao'  => 'permit_empty|string',
    ];
}
