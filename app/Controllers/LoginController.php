<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\ModelUser;
use App\Models\ModelAdmin;
use App\Models\ModelLogActivity;

class LoginController extends BaseController
{
    function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getVar('username');
            $email    = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $login_as = $this->request->getVar('login_as');

            $user = new ModelUser();

            $cek = $user->login($username, $email, $login_as)->first();

            if ($cek == null) {
                return redirect()->back()->withInput()->with('error', 'Data Login Tidak Sesuai');
            }

            $pass_verification =  password_verify($password, $cek['password']);

            if ($pass_verification == null) {
                return redirect()->back()->withInput()->with('error', 'Data Login Tidak Sesuai');
            }

            // Insert Log Activity for This User
            $log_activity = new ModelLogActivity();
            $log_activity->insert([
                'username' => $cek['username'],
                'last_login' => date('Y-m-d h:i:s')
            ]);

            //Create Session Data for This User
            $data_session = [
                'logged'    => TRUE,
                'username'  => $cek['username'],
                'level'     => $cek['level'],
            ];

            $this->session->set($data_session);

            if ($cek['level'] == 'seller') {
                return redirect()->to('/user');
            } else if ($cek['level'] == 'customer') {
                $this->sign_out();
            }
        } else {
            $data['success'] = $this->session->success;
            $data['error'] = $this->session->error;
            return view('user-login', $data);
        }
    }

    public function admin()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getVar('username');
            $email    = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $admin = new ModelAdmin();
            $cek = $admin->login_admin($username, $email)->first();

            if ($cek == null) {
                return redirect()->back()->withInput()->with('error', 'Data Login Tidak Sesuai');
            }

            $pass_verification =  password_verify($password, $cek['password']);

            if ($pass_verification == null) {
                return redirect()->back()->withInput()->with('error', 'Data Login Tidak Sesuai');
            }

            // Insert Log Activity for This User
            $log_activity = new ModelLogActivity();
            $log_activity->insert([
                'username' => $cek['username'],
                'last_login' => date('Y-m-d h:i:s')
            ]);

            //Create Session Data for This User
            $data_session = [
                'logged'    => TRUE,
                'username'  => $cek['username'],
                'level'     => 'admin',
            ];

            $this->session->set($data_session);
            return redirect()->to('/sys');
        } else {
            $data['error'] = $this->session->error;
            if ($this->session->level == 'admin') {
                return redirect()->to('/sys');
            }
            return view('login', $data);
        }
    }

    public function sign_out()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    // function password()
    // {
    //     $hash = password_hash("admin", PASSWORD_DEFAULT);
    //     $verify = password_verify('admin', $hash);
    //     dd($verify);
    // }
}
