<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCoverToTableCategoryProduct extends Migration
{
	public function up()
	{
		//
		$fields = [
			'cover' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null'		=> TRUE,
				'after' => 'category_name'
			]
		];
		$this->forge->addColumn('category_product', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
