<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAppProfile extends Model
{
   protected $table      = 'app_profile';
   protected $primaryKey = 'id';
   protected $useTimestamps = true;
   protected $allowedFields = [
      'address',
      'email',
      'phone',
      'logo',
      'logo_full',
      'created_at',
      'updated_at',
      'deleted_at',
   ];
}
