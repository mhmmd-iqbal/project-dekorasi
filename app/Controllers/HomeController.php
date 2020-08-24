<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\ModelKategori;

class HomeController extends BaseController
{
    public function index()
    {
        $category = new ModelKategori();
        $data = [
            'tittle'    => 'DEKOR ACEH',
            'category'  => $category->get()->getResultObject(),
        ];
        return view('konten-main/home', $data);
    }
}
