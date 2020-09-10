<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBanner extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'banner_image' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'created_by' => [
				'type'	=> 'TEXT',
				'null' => TRUE
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
		$this->forge->createTable('banner');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('banner');
	}
}
