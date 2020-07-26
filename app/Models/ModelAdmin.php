<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    protected $table      = 'tb_admin';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'username',
        'pass',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function checkUser($username)
    {
        $builder = $this->table('tb_admin');
        $builder->select(['username', 'pass', 'status']);
        $builder->where('username', $username);
        $builder->where('status', TRUE);
        return $builder;
    }
}
