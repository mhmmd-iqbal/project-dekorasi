<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ModelUser;
use CodeIgniter\API\ResponseTrait;

class AksiUser extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = new ModelUser();
        if (!isset($this->session->username)) {
            $res = [
                'text'   => 'Session is null',
            ];
            return $this->respond($res, 200);
        }
    }
    function addUser()
    {
        $rules = [
            'username' => 'required|max_length[255]|is_unique[tb_user.username]',
            'pass' => 'required',
            'phone' => 'required',
            'name' => 'required',
        ];
        if (!$this->validate($rules)) {
            $validation =  \Config\Services::validation();
            $res = [
                'text'   => $validation->getErrors(),
                'status' => FALSE
            ];
            return $this->respond($res, 400);
        }

        $simpan = $this->db->save([
            'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
            'pass' => password_hash($this->request->getVar('pass'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name', FILTER_SANITIZE_STRING),
            'phone' => $this->request->getVar('phone', FILTER_SANITIZE_STRING),
            'status'    => $this->request->getVar('status')
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
            $aktifasi_btn = $field->status == '1' ? '<button style="margin-right: 5px;" class="btn btn-sm btn-danger  non-aktif" value="' . $field->username . '"><i class="fa fa-times"></i> Non Aktifkan</button>' : '<button style="margin-right: 5px;" class="btn btn-sm btn-info  aktif" value="' . $field->username . '"><i class="fa fa-power-off"></i> Aktifkan</button>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->username;
            $row[] = $field->name;
            $row[] = $field->phone;
            $row[] = $field->name_usaha == null ? '<i>Belum DIperbarui</i>' : $field->name_usaha;
            $row[] = $field->status == '1' ? '<div class="badge badge-blue">Aktif</div>' : '<div class="badge badge-red">Tidak Aktif</div>';
            $row[] = $field->created_at;
            $row[] = '<a href="/admin/detail/' . $field->username . '" class="btn btn-info detail btn-sm" style="margin-right: 5px;" value="' . $field->username . '"><i class="fa fa-search"></i> </a>' . '<button style="margin-right: 5px;" class="btn btn-sm btn-success  update" value="' . $field->username . '"><i class="fa fa-pencil"></i> </button>' . $aktifasi_btn;
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

    function nonAktif($username)
    {
        $simpan = $this->db
            ->where('username', $username)
            ->set([
                'status' => FALSE
            ])
            ->update();

        if ($simpan == TRUE) {
            $res = [
                'text'  => 'Data Telah Diperbarui',
                'status' => TRUE,
            ];
            return $this->respondCreated($res);
        }
        $res = [
            'text'  => 'GAGAL',
            'status' => FALSE,
        ];
        return $this->respond($res, 400);
    }
    function aktif($username)
    {
        $simpan = $this->db
            ->where('username', $username)
            ->set([
                'status' => TRUE
            ])
            ->update();

        if ($simpan == TRUE) {
            $res = [
                'text'  => 'Data Telah Diperbarui',
                'status' => TRUE,
            ];
            return $this->respondCreated($res);
        }

        $res = [
            'text'  => 'GAGAL',
            'status' => FALSE,
        ];
        return $this->respond($res, 400);
    }
}
