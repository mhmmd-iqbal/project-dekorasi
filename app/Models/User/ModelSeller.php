<?php

namespace App\Models\User;

use CodeIgniter\Model;

class ModelSeller extends Model
{
    protected $table      = 'seller';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name',
        'sex',
        'phone',
        'address',
        'company_name',
        'company_desc',
        'company_address',
        'company_phone',
        'company_logo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function get_data_with_user($id)
    {
        $db    = \Config\Database::connect()->table($this->table);
        $db->select([
            'user.email',
            'user.status',
            'seller.*',
        ]);
        $db->join('user', 'user.username = seller.username');
        $db->where('seller.username', $id);
        $query = $db->get();
        return $query->getFirstRow();
    }
}
