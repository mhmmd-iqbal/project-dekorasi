<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ModelKategori;
use CodeIgniter\API\ResponseTrait;

class CategoryProductController extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->db = new ModelKategori();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data   = [
            'judul'     => 'ADMIN | Data Kategori',
            'username'  => $this->session->username,
            'active'    => 'masterdata'
        ];
        return view('konten-admin/dataKategori', $data);
    }

    function create()
    {
        $category_name = $this->request->getVar('category_name', FILTER_SANITIZE_STRING);
        $data = [
            'category_name' => $category_name,
            'slug'          => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $category_name))),
        ];

        $rules = [
            'category_name' => 'required|max_length[100]',
            // 'cover'         => 'uploaded[cover]|max_size[cover,600]|is_image[cover]',
        ];

        $file = $this->request->getFile('cover');
        $newName = $file->getRandomName();
        $file->move($this->base_file . '/cover', $newName);
        $data['cover'] = $newName;

        if (!$this->validate($rules)) {
            $validation =  \Config\Services::validation();
            $res = [
                'text'   => $validation->getErrors(),
                'status' => FALSE
            ];
            return $this->fail($res, 400);
        }

        $simpan = $this->db->save($data);

        if ($simpan == TRUE) {
            $res = [
                'text'  => 'Data Telah Disimpan',
                'status' => TRUE,
            ];
        }
        return $this->respondCreated($res);
    }

    function get()
    {
        $list = $this->db->get_datatables();
        $data = array();
        $no = $this->request->getPost('start');
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<div class="preview"><img src="' . base_url() . '/assets/cover/' . $field->cover . '" /></div>';
            $row[] = $field->category_name;
            $row[] = $field->slug;
            $row[] = $field->created_at;
            $row[] =  '<button style="margin-right: 5px;" class="btn btn-sm btn-success  update" value="' . $field->id . '"><i class="fa fa-pencil"></i> Edit</button>' . '<button style="margin-right: 5px;" class="btn btn-sm btn-danger  delete" value="' . $field->id . '"><i class="fa fa-times"></i> Delete</button>';
            $data[] = $row;
        }

        $output = array(
            "start" => $this->request->getPost('start'),
            "draw" => $this->request->getPost('draw'),
            "recordsTotal" => $this->db->count_all(),
            "recordsFiltered" => $this->db->count_filtered(),
            "data" => $data,
        );
        return $this->respond($output, 200);
    }
}
