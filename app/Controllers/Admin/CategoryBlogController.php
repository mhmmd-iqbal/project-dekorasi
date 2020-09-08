<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ModelCategoryBlog;
use CodeIgniter\API\ResponseTrait;

class CategoryBlogController extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->db = new ModelCategoryBlog();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data   = [
            'judul'     => 'ADMIN | Data Kategori',
            'username'  => $this->session->username,
            'active'    => 'masterdata'
        ];
        return view('konten-admin/data_category_blog', $data);
    }
}
