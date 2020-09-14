<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelAppProfile;
use CodeIgniter\API\ResponseTrait;

class AppProfileController extends BaseController
{
   use ResponseTrait;

   function __construct()
   {
      $this->db = new ModelAppProfile();
      $this->session = \Config\Services::session();
   }

   function index()
   {
      $data   = [
         'judul'     => 'ADMIN | Profile Aplikasi',
         'username'  => $this->session->username,
         'active'    => 'profile'
      ];
      return view('konten-admin/appProfile', $data);
   }
}
