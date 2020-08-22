<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCategory extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'	=> [
				'type'	=> 'INT',
				'constraint' => 5,
				'unsigned'	=> TRUE,
				'auto_increment' => TRUE
			],
			'category_name' => [
				'type'	=> 'VARCHAR',
				'constraint' => '255',
			],
			'created_at'  => [
				'type'		=> 'DATETIME',
			],
			'updated_at'  => [
				'type'		=> 'DATETIME',
			],
			'deleted_at'  => [
				'type'		=> 'DATETIME',
				'null'		=> TRUE
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('category_product');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('category_product');
	}
}
