<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data 	= [
			'tittle' 	=> 'IDA | Dashboard',
			'active'	=> 'home'
		];
		return view('konten-main/home', $data);
	}
	//--------------------------------------------------------------------

}
