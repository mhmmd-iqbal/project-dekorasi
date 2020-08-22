<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUser extends Migration
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
				'unique'		=> TRUE
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'unique'		=> TRUE
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'status'      => [
				'type'           => 'INT',
				'constraint'     => 1,
			],
			'level'		=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> '255'
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
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('user');
	}
}
