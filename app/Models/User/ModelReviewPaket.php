<?php

namespace App\Models\User;

use CodeIgniter\Model;

class ModelReviewPaket extends Model
{
    protected $table      = 'tb_review_paket';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    private function _get_query()
    {

        $db    = \Config\Database::connect()->table($this->table);
        $column_order = array(null, 'reviewer_name', 'reviewer_phone', 'point');
        $column_search = array('reviewer_name', 'reviewer_phone');
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

    function get_datatables($id_paket = null)
    {
        $db    = \Config\Database::connect()->table($this->table);
        $this->_get_query();
        if ($_POST['length'] != -1) {
            $db->limit($_POST['length'], $_POST['start']);
        }

        $db->where('id_paket', $id_paket);
        $db->where('status', TRUE);
        $query = $db->get();
        return $query->getResultObject();
    }

    function count_filtered($id_paket = null)
    {
        $db    = \Config\Database::connect()->table($this->table);
        $db->where('id_paket', $id_paket);
        $db->where('status', TRUE);
        $this->_get_query();
        return $db->countAllResults();
    }

    public function count_all($username)
    {
        $db    = \Config\Database::connect()->table($this->table);
        $db->join('tb_paket', 'tb_paket.id = tb_review_paket.id_paket');
        $db->where('tb_paket.username', $username);
        return $db->countAllResults();
    }

    function review($username)
    {
        $db    = \Config\Database::connect()->table($this->table);
        $db->select([
            'tb_review_paket.*',
            'tb_paket.username',
            'tb_paket.nama'
        ]);
        $db->join('tb_paket', 'tb_paket.id = tb_review_paket.id_paket');
        $db->where('tb_paket.username', $username);
        $db->orderBy('tb_review_paket.created_at', 'DESC');
        $db->limit(0, 6);
        return  $db->get()->getResultObject();
    }
    function getBintangCount($username, $jml_bintang)
    {
        $db    = \Config\Database::connect()->table($this->table);
        $db->join('tb_paket', 'tb_paket.id = tb_review_paket.id_paket');
        $db->where('tb_paket.username', $username);
        $db->where('tb_review_paket.point', $jml_bintang);
        return $db->countAllResults();
    }
}
