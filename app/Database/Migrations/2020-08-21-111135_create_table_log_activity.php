<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableLogActivity extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'last_login'  => [
				'type'		=> 'DATETIME',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('log_activity');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('log_activity');
	}
}
