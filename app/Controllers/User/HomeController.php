<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data   = [
            'judul'     => 'USER | Dashboard',
            'username'  => $this->session->username,
            'active'    => 'dashboard'
        ];
        return view('konten-user/dashboard', $data);
    }
}
