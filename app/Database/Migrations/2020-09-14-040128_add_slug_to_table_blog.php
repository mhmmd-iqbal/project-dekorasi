<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSlugToTableBlog extends Migration
{
	public function up()
	{
		//
		$fields = [
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'after' => 'blog_image'
			],

		];
		$this->forge->addColumn('blog', $fields);
	}
	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
