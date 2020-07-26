<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Filters\AdminLogin;

class Dashboard extends BaseController
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data   = [
            'judul'    => 'ADMIN | Dashboard',
            'username' => $this->session->username,
        ];
        return view('admin/dashboard', $data);
    }
}
