<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSeller extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'	=> [
				'type'	=> 'INT',
				'constraint'	=> 5,
				'unsigned'	=> TRUE,
				'auto_increment' => TRUE
			],
			'username'	=> [
				'type'	=> 'VARCHAR',
				'constraint' => '100',
				'unique'	=> TRUE
			],
			'name'	=> [
				'type' => 'VARCHAR',
				'constraint'	=> 255,
			],
			'sex'	=> [
				'type' => 'VARCHAR',
				'constraint'	=> 6,
				'null'		=> TRUE
			],
			'phone'	=> [
				'type' => 'VARCHAR',
				'constraint'	=> 15,
			],
			'address'	=> [
				'type' => 'VARCHAR',
				'constraint'	=> 255,
				'null'		=> TRUE
			],
			'company_name'	=> [
				'type' => 'VARCHAR',
				'constraint'	=> 255,
			],
			'company_desc'	=> [
				'type' => 'VARCHAR',
				'constraint'	=> 500,
				'null'		=> TRUE
			],
			'company_address'	=> [
				'type' => 'VARCHAR',
				'constraint'	=> 255,
				'null'		=> TRUE
			],
			'company_phone'	=> [
				'type' => 'VARCHAR',
				'constraint'	=> 15,
				'null'		=> TRUE
			],
			'verified_account' => [
				'type'	=> 'INT',
				'constraint'	=> 1,
				'default'	=> 0
			],
			'company_logo'	=> [
				'type' => 'VARCHAR',
				'constraint'	=> 255,
				'null'		=> TRUE
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
		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('username', 'user', 'username', 'NO ACTION', 'NO ACTION');
		$this->forge->createTable('seller');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('seller');
	}
}
