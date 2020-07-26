<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        $data     = [
            'tittle'     => 'IDA | Kontak Kami',
            'active'    => 'contact'
        ];
        return view('main/contact', $data);
    }
    //--------------------------------------------------------------------

}
