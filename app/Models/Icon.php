<?php

namespace App\Models;

use CodeIgniter\Model;

class Icon extends Model
{
    protected $table      = 'icons';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['name', 'tag', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Opcional: reglas de validación
    protected $validationRules    = [
        'name' => 'required|max_length[100]',
        'tag'  => 'required|max_length[50]'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
