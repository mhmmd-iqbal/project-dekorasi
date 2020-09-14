<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelBlog;
use CodeIgniter\API\ResponseTrait;

class BlogController extends BaseController
{
   use ResponseTrait;

   function __construct()
   {
      $this->db = new ModelBlog();
      $this->session = \Config\Services::session();
   }

   function index()
   {
      $data   = [
         'judul'     => 'ADMIN | Data Konten',
         'username'  => $this->session->username,
         'active'    => 'blog'
      ];
      return view('konten-admin/kontenBlog', $data);
   }

   function new()
   {
      $data   = [
         'judul'     => 'ADMIN | Data Konten',
         'username'  => $this->session->username,
         'active'    => 'blog'
      ];
      return view('konten-admin/addKontenBlog', $data);
   }
}
