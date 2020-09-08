<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBlog extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'	=> [
				'type'	=> 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment'	=> TRUE
			],
			'id_catgeory'	=> [
				'type'	=> 'INT',
				'constraint' => 5,
			],
			'blog_title'	=> [
				'type'	=> 'VARCHAR',
				'constraint' => 255,
			],
			'blog_content'	=> [
				'type'	=> 'TEXT',
			],
			'blog_image'	=> [
				'type'	=> 'VARCHAR',
				'constraint' => 255
			],
			'created_at'  => [
				'type'	=> 'DATETIME',
			],
			'updated_at'  => [
				'type'	=> 'DATETIME',
			],
			'deleted_at'  => [
				'type'	=> 'DATETIME',
				'null'	=> TRUE
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('blog');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('blog');
	}
}
