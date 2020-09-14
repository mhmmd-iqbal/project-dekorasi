<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSlugToTableCategoryBlog extends Migration
{
	public function up()
	{
		//
		$fields = [
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'after' => 'category_name'
			]
		];
		$this->forge->addColumn('category_blog', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
