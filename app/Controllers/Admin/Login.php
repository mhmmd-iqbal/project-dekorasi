<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;
use CodeIgniter\API\ResponseTrait;

class Login extends BaseController
{
    use ResponseTrait;
    protected $validation;
    protected $session;
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }
    function index()
    {
        return view('login');
    }

    public function validasi()
    {
        $db = new ModelAdmin();
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
        ])) {
            $res = [
                'error' => TRUE,
                'message' => $this->validation
            ];
            return $this->setResponseFormat('json')->respond($res);
        }
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $db->checkUser($username)->first();

        if ($data == null) {
            $res = [
                'error' => TRUE,
                'message' => "Password atau username tidak sesuai"
            ];
            return $this->setResponseFormat('json')->respond($res);
        }

        $cekPass = password_verify($password, $data['pass']);;
        if ($cekPass == FALSE) {
            $res = [
                'error' => TRUE,
                'message' => "Password atau username tidak sesuai"
            ];
            return $this->setResponseFormat('json')->respond($res);
        }
        $sessionData = [
            'username'  => $data['username'],
            'status'    => $data['status'],
            'logged_in' => TRUE,
            'level'     => 1
        ];
        $this->session->set($sessionData);
        $res = [
            'error' => FALSE,
            'message' => "Login Berhasil"
        ];
        return $this->setResponseFormat('json')->respond($res);
    }
}
