<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\PendidikanModel;

class Pendidikan extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        helper('form');
        $data = [
            'judul' => 'Admin | Pendidikan',
            'nama_sekolah' => [
                'name'      => 'nama_sekolah',
                'id'        => 'nama_sekolah',
                'class'     => 'form-control form-group',
                'placeholder' => 'Nama Instansi...'
            ],
            'asal_sekolah' => [
                'name'      => 'asal_sekolah',
                'id'        => 'asal_sekolah',
                'class'     => 'form-control form-group',
                'placeholder' => 'Asal Instansi...'
            ],
            'jenjang' => [
                'name'      => 'jenjang',
                'id'        => 'jenjang',
                'class'     => 'form-control form-group',
            ],
            'jenjang_option'    => [
                'sd'    => 'SD',
                'smp'   => 'SMP',
                'sma'   => 'SMA',
                's1'    => 'Sarjana',
                'd4'    => 'Sarjana Terapan',
                's2'    => 'Magister',
            ],
            'tahun' => [
                'name'      => 'tahun',
                'id'        => 'tahun',
                'type'      => 'number',
                'class'     => 'form-control form-group',
                'placeholder' => 'contoh. 2020...'
            ],
            'ijazah' => [
                'name'      => 'ijazah',
                'id'        => 'ijazah',
                'class'     => 'form-control form-group',
                'accept'    => "image/*"
            ],
        ];
        return view('admin/pendidikan', $data);
    }

    function get()
    {
        $dataModel = new PendidikanModel();
        $list = $dataModel->get_datatables();
        $data = array();
        $no = $this->request->getPost('start');
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_sekolah;
            $row[] = $field->asal_sekolah;
            $row[] = strtoupper($field->jenjang);
            $row[] = $field->tahun;
            $row[] = '<button class="btn btn-sm btn-info m-1 update" value="' . $field->ijazah . '">Ijazah</button>' . '<button class="btn btn-sm btn-success m-1 update" value="' . $field->id . '">Edit</button>' . '<button class="btn btn-sm btn-danger m-1 delete" value="' . $field->id . '">Hapus</button>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $this->request->getPost('draw'),
            "recordsTotal" => $dataModel->count_all(),
            "recordsFiltered" => $dataModel->count_filtered(),
            "data" => $data,
        );
        return $this->respond($output, 200);
    }
    function add()
    {
        $rules = [
            'nama_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Sekolah tidak boleh kosong'
                ]
            ],
            'asal_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal Sekolah tidak boleh kosong'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun tidak boleh kosong'
                ]
            ],
            'ijazah' => 'uploaded[ijazah]|max_size[ijazah,1024]|is_image[ijazah]|mime_in[ijazah,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            $validation =  \Config\Services::validation();
            $res = [
                'header' => 'GAGAL',
                'text'   => $validation->getError(),
                'icon'   => 'error',
                'status' => FALSE
            ];
            return $this->setResponseFormat('json')->respond($res);
        }

        $file = $this->request->getFile('ijazah');
        $newName = $file->getRandomName();
        $file->move('assets/ijazah', $newName);

        $dataModel = new PendidikanModel();
        $simpan = $dataModel->save([
            'nama_sekolah' => $this->request->getVar('nama_sekolah'),
            'asal_sekolah' => $this->request->getVar('asal_sekolah'),
            'jenjang' => $this->request->getVar('jenjang'),
            'tahun' => $this->request->getVar('tahun'),
            'ijazah' => $newName,
        ]);

        $res = [
            'header' => 'BERHASIL',
            'text'  => 'Data Telah Diperbarui',
            'icon'  => 'success',
            'status' => TRUE,
            'data'  => $this->request->getVar(),
            'hasil' => $simpan
        ];
        return $this->respondCreated($res);
    }
    //--------------------------------------------------------------------

}
