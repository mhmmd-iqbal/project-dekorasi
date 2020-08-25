<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\ModelKategori;

class ProductController extends BaseController
{
    public function index($slug = null)
    {
        $category = new ModelKategori();
        $data = [
            'tittle'    => 'DEKOR ACEH | Product',
            'slug'      => $slug
        ];

        dd($data);
        // return view('konten-main/home', $data);
    }
}
