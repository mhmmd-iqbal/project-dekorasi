<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'username' => [
				'type'          => 'VARCHAR',
				'constraint'    => '255',
				'null'          => FALSE,
			],
			'pass' => [
				'type'          => 'VARCHAR',
				'constraint'    => '255',
				'null'          => FALSE,
			],
			'name' => [
				'type'			=> 'TEXT',
				'null'			=> TRUE,
			],
			'phone' => [
				'type'			=> 'VARCHAR',
				'constraint'    => '15',
				'null'			=> TRUE,
			],
			'whatsapp' => [
				'type'			=> 'VARCHAR',
				'constraint'    => '15',
				'null'			=> TRUE,
			],
			'description' => [
				'type'			=> 'TEXT',
				'null'			=> TRUE,
			],
			'status' => [
				'type'			=> 'INT',
				'constraint'	=> 1,
			],
			'created_at' => [
				'type'			=> 'DATETIME',
				'null'			=> TRUE,
			],
			'updated_at' => [
				'type'			=> 'DATETIME',
				'null'			=> TRUE,
			],
			'deleted_at' => [
				'type'			=> 'DATETIME',
				'null'			=> TRUE,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_user');
	}

	public function down()
	{
		$this->forge->dropTable('tb_user');
	}
}
