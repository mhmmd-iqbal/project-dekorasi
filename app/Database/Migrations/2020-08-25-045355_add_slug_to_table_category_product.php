<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSlugToTableCategoryProduct extends Migration
{
	public function up()
	{
		//
		$fields = [
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'after' => 'cover'
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
