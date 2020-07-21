<?php

namespace App\Controllers;

class Jasa extends BaseController
{
	public function index()
	{
		$data 	= [
			'tittle' 	=> 'IDA | Jasa Dekoraasi',
			'active'	=> 'jasa'
		];
		return view('main/jasa', $data);
	}

	//--------------------------------------------------------------------

}
