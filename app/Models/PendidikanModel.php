<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table      = 'tb_pendidikan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_sekolah', 'asal_sekolah', 'jenjang', 'tahun', 'ijazah'];

    private function _get_query()
    {
        $db    = \Config\Database::connect()->table($this->table);
        $column_order = array(null, 'nama_sekolah', 'asal_sekolah', 'tahun');
        $column_search = array('nama_sekolah');
        $order = array('tahun' => 'desc');
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
