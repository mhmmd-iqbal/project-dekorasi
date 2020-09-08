<?php

namespace App\Models\User;

use CodeIgniter\Model;

class ModelProduct extends Model
{
    protected $table      = 'product';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_category',
        'username',
        'product_name',
        'product_desc',
        'product_image',
        'product_price',
        'product_disc',
        'product_quantity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    private function _get_query($username)
    {
        $db    = \Config\Database::connect()->table($this->table);
        $column_order = array(null, 'username', null);
        $column_search = array('username');
        $order = array('product.created_at' => 'desc');

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

    function get_datatables($username)
    {
        $db    = \Config\Database::connect()->table($this->table);
        $this->_get_query($username);
        if ($_POST['length'] != -1) {
            $db->limit($_POST['length'], $_POST['start']);
        }
        $db->select('product.*');
        $db->select('category_product.category_name');
        $db->join('category_product', 'category_product.id = product.id_category');
        $db->where('product.username', $username);
        $query = $db->get();
        return $query->getResultObject();
    }

    function count_filtered($username)
    {
        $db    = \Config\Database::connect()->table($this->table);
        $this->_get_query($username);
        $db->select('product.*');
        $db->select('category_product.category_name');
        $db->join('category_product', 'category_product.id = product.id_category');
        $db->where('product.username', $username);
        return $db->countAllResults();
    }

    public function count_all($username)
    {
        $db    = \Config\Database::connect()->table($this->table);
        $db->join('category_product', 'category_product.id = product.id_category');
        $db->where('product.username', $username);
        return $db->countAllResults();
    }
}
