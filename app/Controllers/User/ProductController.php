<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Admin\ModelKategori;
use App\Models\User\ModelProduct;
use CodeIgniter\API\ResponseTrait;


class ProductController extends BaseController
{

    use ResponseTrait;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->product = new ModelProduct();
    }

    public function index()
    {

        $data   = [
            'judul'     => 'USER | Product',
            'username'  => $this->session->username,
            'active'    => 'product',
        ];
        return view('konten-user/product', $data);
    }

    public function new()
    {
        $category = new ModelKategori();
        $data   = [
            'judul'     => 'USER | Product',
            'username'  => $this->session->username,
            'active'    => 'product',
            'category'  => $category->get()->getResultObject()
        ];
        return view('konten-user/add_product', $data);
    }

    public function get()
    {
        $username = $this->session->username;
        $list = $this->product->get_datatables($username);
        $data = array();
        $no = $this->request->getPost('start');
        foreach ($list as $field) {

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->product_name;
            $row[] = $field->product_price;
            $row[] = $field->product_disc;
            $row[] = '';
            $row[] = '<a href="/sys/seller/' . $field->id . '" class="btn btn-info detail btn-sm" style="margin-right: 5px;"><i class="fa fa-search"></i> </a>' . '<button  style="margin-right: 5px;" class="btn btn-sm btn-danger" value="' . $field->id . '"><i class="fa fa-trash-o"></i> </button>';
            $data[] = $row;
        }

        $output = array(
            "start" => $this->request->getPost('start'),
            "draw" => $this->request->getPost('draw'),
            "recordsTotal" => $this->product->count_all($username),
            "recordsFiltered" => $this->product->count_filtered($username),
            "data" => $data,
        );
        return $this->respond($output, 200);
    }
}
