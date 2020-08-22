<?php

namespace App\Models\User;

use CodeIgniter\Model;

class ModelSeller extends Model
{
    protected $table      = 'seller';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
}
