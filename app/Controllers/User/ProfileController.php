<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data   = [
            'judul'     => 'USER | Profile',
            'username'  => $this->session->username,
            'active'    => 'profile'
        ];
        return view('konten-user/profile', $data);
    }
}
