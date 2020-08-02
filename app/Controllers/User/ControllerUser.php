<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class ControllerUser extends BaseController
{
    protected $session;
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

    public function profile()
    {
        $data   = [
            'judul'     => 'USER | Profile',
            'username'  => $this->session->username,
            'active'    => 'profile'
        ];
        return view('konten-user/profile', $data);
    }
    public function faq()
    {
        $data   = [
            'judul'     => 'USER | FAQs',
            'username'  => $this->session->username,
            'active'    => 'faq'
        ];
        return view('konten-user/faq', $data);
    }
    public function review()
    {
        $data   = [
            'judul'     => 'USER | Review',
            'username'  => $this->session->username,
            'active'    => 'review'
        ];
        return view('konten-user/review', $data);
    }
    public function account()
    {
        $data   = [
            'judul'     => 'USER | My Account',
            'username'  => $this->session->username,
            'active'    => 'account'
        ];

        return view('konten-user/account', $data);
    }
    function paket()
    {
        $data = [
            'judul' => 'USER | Daftar Paket',
            'username'  => $this->session->username,
            'active'    => 'paket'
        ];
        return view('konten-user/paket', $data);
    }
}
