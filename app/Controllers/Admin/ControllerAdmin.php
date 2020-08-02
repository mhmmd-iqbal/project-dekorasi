<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Filters\AdminLogin;

class ControllerAdmin extends BaseController
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data   = [
            'judul'     => 'ADMIN | Dashboard',
            'username'  => $this->session->username,
            'active'    => 'dashboard'
        ];
        return view('konten-admin/template', $data);
    }

    function dataAdmin()
    {
        $data   = [
            'judul'     => 'ADMIN | Data Admin',
            'username'  => $this->session->username,
            'active'    => 'masterdata'
        ];
        return view('konten-admin/dataAdmin', $data);
    }

    function dataUser()
    {
        $data   = [
            'judul'     => 'ADMIN | Data User',
            'username'  => $this->session->username,
            'active'    => 'masterdata'
        ];
        return view('konten-admin/dataAdmin', $data);
    }

    function dataPaket()
    {
        $data   = [
            'judul'     => 'ADMIN | Data Paket',
            'username'  => $this->session->username,
            'active'    => 'masterdata'
        ];
        return view('konten-admin/dataAdmin', $data);
    }
}
