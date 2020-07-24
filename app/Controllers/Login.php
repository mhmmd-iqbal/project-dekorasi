<?php

namespace App\Controllers;

class Login extends BaseController
{
    protected $validation;
    protected $session;
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data = [
            'validation' => $this->session->validation
        ];
        return view('login', $data);
    }

    public function allIn()
    {
        $encr = password_hash("admin", PASSWORD_BCRYPT);
        $decr = password_verify("admin", $encr);
        // Hasilnya Bool
    }

    function signIn()
    {
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
            return redirect()->to('/login')->with('validation', $this->validation);
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
    }

    function cek()
    {
    }
}
