<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToTableBanner extends Migration
{
	public function up()
	{
		//
		$fields = [
			'status' => [
				'type' => 'INT',
				'constraint' => 1,
				'after' => 'banner_image'
			]
		];
		$this->forge->addColumn('banner', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
