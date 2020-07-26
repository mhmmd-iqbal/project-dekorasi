<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Filters\AdminSession;

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
            'judul'    => 'USER | Dashboard',
            'username' => $this->session->username,
        ];
        return view('user/user-template', $data);
    }
}
