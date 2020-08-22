<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ModelSeller extends Model
{
    protected $table      = 'seller';
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

    private function _get_query()
    {
        $db    = \Config\Database::connect()->table($this->table);
        $column_order = array(null, 'username', 'name');
        $column_search = array('username', 'name');
        $order = array('created_at' => 'desc');
        $db->from($this->table);
        $i = 0;
        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $db->groupStart();
                    $db->like($item, $_POST['search']['value']);
                } else {
                    $db->orLike($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $db->groupEnd();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $db->orderBy($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $db->orderBy(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $db    = \Config\Database::connect()->table($this->table);
        $this->_get_query();
        if ($_POST['length'] != -1) {
            $db->limit($_POST['length'], $_POST['start']);
        }
        $query = $db->get();
        return $query->getResultObject();
    }

    function count_filtered()
    {
        $db    = \Config\Database::connect()->table($this->table);
        $this->_get_query();
        return $db->countAllResults();
    }

    public function count_all()
    {
        $db    = \Config\Database::connect()->table($this->table);
        return $db->countAllResults();
    }
}
