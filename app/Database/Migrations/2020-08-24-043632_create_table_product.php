<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableProduct extends Migration
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
			'id_category'	=> [
				'type'	=> 'INT',
				'constraint' => '5',
			],
			'username'	=> [
				'type'	=> 'VARCHAR',
				'constraint' => '100',
			],
			'product_name'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 255,
			],
			'product_desc'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 500,
			],
			'product_image'	=> [
				'type'	=> 'VARCHAR',
				'constraint'	=> 255,
			],
			'product_price'	=> [
				'type'	=> 'INT',
				'constraint'	=> 10,
			],
			'product_disc'	=> [
				'type'	=> 'INT',
				'constraint'	=> 10,
			],
			'product_quantity'	=> [
				'type'	=> 'INT',
				'constraint'	=> 10,
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
		// $this->forge->addForeignKey('id_category', 'category_product', 'id');
		$this->forge->addForeignKey('username', 'user', 'username', 'NO ACTION', 'NO ACTION');
		$this->forge->createTable('product');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('product');
	}
}
