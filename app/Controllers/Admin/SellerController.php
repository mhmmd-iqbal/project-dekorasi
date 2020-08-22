<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ModelSeller;
use App\Models\Admin\ModelUser;
use CodeIgniter\API\ResponseTrait;

class SellerController extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->seller = new ModelSeller();
        $this->session = \Config\Services::session();
    }


    public function index()
    {
        $data   = [
            'judul'     => 'ADMIN | Data Seller',
            'username'  => $this->session->username,
            'active'    => 'masterdata'
        ];
        return view('konten-admin/dataSeller', $data);
    }

    public function new()
    {
        $data   = [
            'judul'     => 'ADMIN | Data Seller',
            'username'  => $this->session->username,
            'active'    => 'masterdata'
        ];
        return view('konten-admin/addDataSeller', $data);
    }

    public function show($id)
    {
        $seller = $this->seller->get_data_with_user($id);
        $data   = [
            'judul'     => 'ADMIN | Data Seller',
            'username'  => $this->session->username,
            'active'    => 'masterdata',
            'seller'    => $seller
        ];
        return view('konten-admin/showSeller', $data);
    }

    public function get()
    {
        $list = $this->seller->get_datatables();
        $data = array();
        $no = $this->request->getPost('start');
        foreach ($list as $field) {
            $verifikasi_btn = $field->verified_account == '0' ? '<button style="margin-right: 5px;" class="btn btn-sm btn-success verif" value="' . $field->username . '"><i class="fa fa-check"></i> Verifikasi Manual </button>' : '';

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->username;
            $row[] = $field->name;
            $row[] = $field->phone == NULL ? '-' : $field->phone;
            $row[] = $field->company_name  ==  NULL ? '<strong class="text-danger">Belum Diperbarui</strong>' : $field->company_name;
            $row[] = $field->verified_account == '1' ? '<strong class="text-success">Telah Diverifikasi</strong>' : '<strong class="text-danger">Belum Diverifikasi</strong>';
            $row[] = $field->created_at;
            $row[] = '<a href="/sys/seller/' . $field->username . '" class="btn btn-info detail btn-sm" style="margin-right: 5px;"><i class="fa fa-search"></i> </a>' . '<button  style="margin-right: 5px;" class="btn btn-sm btn-danger" value="' . $field->username . '"><i class="fa fa-trash-o"></i> </button>' . $verifikasi_btn;
            $data[] = $row;
        }

        $output = array(
            "start" => $this->request->getPost('start'),
            "draw" => $this->request->getPost('draw'),
            "recordsTotal" => $this->seller->count_all(),
            "recordsFiltered" => $this->seller->count_filtered(),
            "data" => $data,
        );
        return $this->respond($output, 200);
    }

    public function verification()
    {
        $username = $this->request->getVar('username');
        $verificate = $this->seller
            ->where('username', $username)
            ->set([
                'verified_account' => TRUE
            ])
            ->update();

        if ($verificate == TRUE) {
            $user = new ModelUser();

            $activate = $user
                ->where('username', $username)
                ->set([
                    'status' => TRUE
                ])
                ->update();
            if ($activate == TRUE) {
                $res = [
                    'text'  => 'Data Telah Diperbarui',
                    'status' => TRUE,
                ];
                return $this->respondCreated($res);
            }
        }

        $res = [
            'text'  => 'GAGAL',
            'status' => FALSE,
        ];

        return $this->respond($res, 400);
    }
}
