<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ModelContact extends Model
{
    protected $table      = 'tb_contact';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'phone', 'address', 'instagram', 'facebook'];
}
