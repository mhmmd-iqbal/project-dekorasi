<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\ModelKategori;
use App\Models\User\ModelProduct;

class HomeController extends BaseController
{
    public function index()
    {

        $product = new ModelProduct();
        $category = new ModelKategori();
        $lastest_product = $product
            ->orderBy('created_at', 'DESC')
            ->findAll('6', '0');
        // dd($lastest_product);
        $data = [
            'tittle'    => 'DEKOR ACEH',
            'category'  => $category->get()->getResultObject(),
            'lastest_product' => $lastest_product
        ];
        return view('konten-main/home', $data);
    }
}
