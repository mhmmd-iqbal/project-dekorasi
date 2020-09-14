<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBlog extends Model
{
   protected $table      = 'blog';
   protected $primaryKey = 'id';
   protected $useTimestamps = true;
   protected $allowedFields = [
      'username',
      'name',
      'sex',
      'phone',
      'address',
      'company_name',
      'company_desc',
      'company_phone',
      'company_logo',
      'verified_account',
      'created_at',
      'updated_at',
      'deleted_at',
   ];
}
