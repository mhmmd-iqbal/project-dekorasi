<?php

namespace App\Models\User;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'username',
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
