<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelBanner;
use CodeIgniter\API\ResponseTrait;

class BannerController extends BaseController
{
    use ResponseTrait;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->banner = new ModelBanner();
    }

    public function index()
    {
        $data   = [
            'judul'     => 'ADMIN | Banner',
            'username'  => $this->session->username,
            'active'    => 'banner'
        ];
        return view('konten-admin/banner', $data);
    }

    public function create()
    {
        $rules = [
            'banner_image'         => 'uploaded[banner_image]|max_size[banner_image,600]|is_image[banner_image]',
        ];

        if (!$this->validate($rules)) {
            $validation =  \Config\Services::validation();
            $res = [
                'text'   => $validation->getErrors(),
                'status' => FALSE
            ];
            return $this->fail($res, 400);
        }

        $file = $this->request->getFile('banner_image');
        $newName = $file->getRandomName();
        $file->move($this->base_file . '/cover', $newName);
        $data = [
            'status'        => FALSE,
            'created_by'    => $this->session->username,
            'banner_image'  => $newName,
        ];

        $simpan = $this->banner->save($data);

        if ($simpan == TRUE) {
            $res = [
                'text'  => 'Data Telah Disimpan',
                'status' => TRUE,
            ];
        }
        return $this->respondCreated($res);
    }

    function get(){
        $list = $this->banner->get_datatables();
        $data = array();
        $no = $this->request->getPost('start');
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img src="'.base_url().'/assets/cover/'.$field->banner_image.'" style="max-width:20vmin;" >';
            $row[] = $field->created_at;
            $row[] = $field->created_by;
            $row[] = $field->status == 0 ? '<button data-id="'.$field->id.'" class="btn btn-success btn-sm publish"><i class="fa fa-upload"></i><br><small>Publish</small></button>' : '<button  class="btn btn-default btn-sm"><i class="fa fa-eye"></i><br><small>Published</small></button>';
            $row[] =    '<button class="btn btn-danger btn-sm">'.
                            '<i class="fa fa-trash-o"></i>'.
                            '<br><small>Delete</small>'.
                        '</button>'.
                        '<button class="btn btn-info btn-sm">'.
                            '<i class="fa fa-refresh"></i>'.
                            '<br><small>Update</small>'.
                        '</button>';
            $data[] = $row;
        }

        $output = array(
            "start" => $this->request->getPost('start'),
            "draw" => $this->request->getPost('draw'),
            "recordsTotal" => $this->banner->count_all(),
            "recordsFiltered" => $this->banner->count_filtered(),
            "data" => $data,
        );
        return $this->respond($output, 200);
    }

    function publish($id){
        $publish = $this->banner
            ->where('id', $id)
            ->set([
                'status' => TRUE
            ])
            ->update();

        if ($publish == TRUE) {
            $res = [
                'text'  => 'Data Telah Diperbarui',
                'status' => TRUE,
            ];
            return $this->respondCreated($res);
        }
        $res = [
            'text'  => 'GAGAL',
            'status' => FALSE,
        ];
        return $this->respond($res, 200);
    }
}
