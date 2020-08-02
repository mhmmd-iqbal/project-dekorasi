<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ModelKategori;
use CodeIgniter\API\ResponseTrait;

class AksiKategori extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = new ModelKategori();
        if (!isset($this->session->username)) {
            $res = [
                'text'   => 'Session is null',
            ];
            return $this->respond($res, 200);
        }
    }
    function add()
    {
        $rules = [
            'kategori' => 'required|max_length[255]',
        ];
        if (!$this->validate($rules)) {
            $validation =  \Config\Services::validation();
            $res = [
                'text'   => $validation->getErrors(),
                'status' => FALSE
            ];
            return $this->fail($res, 400);
        }

        $simpan = $this->db->save([
            'kategori' => $this->request->getVar('kategori', FILTER_SANITIZE_STRING),
        ]);

        if ($simpan == TRUE) {
            $res = [
                'text'  => 'Data Telah Disimpan',
                'status' => TRUE,
            ];
        }
        return $this->respondCreated($res);
    }

    function get()
    {
        $list = $this->db->get_datatables();
        $data = array();
        $no = $this->request->getPost('start');
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kategori;
            $row[] = $field->created_at;
            $row[] = '<button style="margin-right: 5px;" class="btn btn-sm btn-success  update" value="' . $field->id . '"><i class="fa fa-pencil"></i> Edit</button>' . '<button style="margin-right: 5px;" class="btn btn-sm btn-danger  delete" value="' . $field->id . '"><i class="fa fa-times"></i> Delete</button>';
            $data[] = $row;
        }

        $output = array(
            "start" => $this->request->getPost('start'),
            "draw" => $this->request->getPost('draw'),
            "recordsTotal" => $this->db->count_all(),
            "recordsFiltered" => $this->db->count_filtered(),
            "data" => $data,
        );
        return $this->respond($output, 200);
    }
}
