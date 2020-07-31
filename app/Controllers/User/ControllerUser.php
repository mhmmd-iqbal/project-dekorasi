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
        return view('user/dashboard', $data);
    }
    public function faq()
    {
        $data   = [
            'judul'     => 'USER | FAQs',
            'username'  => $this->session->username,
            'active'    => 'faq'
        ];
        return view('user/faq', $data);
    }
    public function review()
    {
        $data   = [
            'judul'     => 'USER | Review',
            'username'  => $this->session->username,
            'active'    => 'review'
        ];
        return view('user/review', $data);
    }
    public function account()
    {
        $data   = [
            'judul'     => 'USER | My Account',
            'username'  => $this->session->username,
            'active'    => 'account'
        ];

        return view('user/account', $data);
    }
}
