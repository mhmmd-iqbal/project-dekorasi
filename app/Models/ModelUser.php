<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table      = 'tb_user';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'username',
        'pass',
        'name',
        'phone',
        'whatsapp',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function checkUser($username)
    {
        $builder = $this->table('tb_usere');
        $builder->select(['username', 'pass', 'status']);
        $builder->where('username', $username);
        $builder->where('status', TRUE);

        return $builder;
    }
}
