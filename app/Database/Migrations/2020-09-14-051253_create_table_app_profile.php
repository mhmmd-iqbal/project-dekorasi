<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAppProfile extends Migration
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
			'address' => [
				'type' => 'text',
				'null' => TRUE
			],
			'email' => [
				'type' => 'TEXT',
				'null' => TRUE
			],
			'phone'	=> [
				'type' => 'VARCHAR',
				'constraint' => 15,
				'null' => TRUE
			],
			'logo' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
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
		$this->forge->createTable('app_profile');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('app_profile');
	}
}
