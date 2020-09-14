<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLogoFullToTableAppProfile extends Migration
{
	public function up()
	{
		//
		$fields = [
			'logo_full' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'after' => 'logo'
			],

		];
		$this->forge->addColumn('app_profile', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
