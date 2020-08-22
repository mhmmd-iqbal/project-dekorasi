<?php

namespace App\Models\User;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
}
