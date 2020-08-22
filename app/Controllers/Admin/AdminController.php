<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;
use CodeIgniter\API\ResponseTrait;

class AdminController extends BaseController
{
    use ResponseTrait;
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = new ModelAdmin();
    }

    public function index()
    {
        $data   = [
            'judul'     => 'ADMIN | Data Admin',
            'username'  => $this->session->username,
            'active'    => 'masterdata'
        ];
        return view('konten-admin/dataAdmin', $data);
    }

    function create()
    {
        $rules = [
            'username' => 'required|max_length[255]|is_unique[admin.username]',
            'email' => 'required|valid_email|is_unique[admin.email]',
            'password' => 'required',
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
            'email' => $this->request->getVar('email', FILTER_SANITIZE_EMAIL),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
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
            $aktifasi_btn = $field->status == '1' ? '<button style="margin-right: 5px;" class="btn btn-sm btn-danger  non-aktif" value="' . $field->id . '"><i class="fa fa-times"></i> Non Aktifkan</button>' : '<button style="margin-right: 5px;" class="btn btn-sm btn-info  aktif" value="' . $field->id . '"><i class="fa fa-power-off"></i> Aktifkan</button>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->username;
            $row[] = $field->email;
            $row[] = $field->created_at;
            $row[] = $field->status == '1' ? '<div class="badge badge-blue">Aktif</div>' : '<div class="badge badge-red">Tidak Aktif</div>';
            $row[] = '<button style="margin-right: 5px;" class="btn btn-sm btn-success  update" value="' . $field->id . '"><i class="fa fa-pencil"></i> Edit</button>' . $aktifasi_btn;
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

    function non_aktif()
    {
        $id = $this->request->getVar('id');
        $simpan = $this->db
            ->where('id', $id)
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
    function aktif()
    {
        $id = $this->request->getVar('id');
        $simpan = $this->db
            ->where('id', $id)
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
