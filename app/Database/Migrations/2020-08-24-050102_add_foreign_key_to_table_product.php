<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeyToTableProduct extends Migration
{
	public function up()
	{
		//
		// $this->forge->addForeignKey('username', 'seller', 'username');
		// $this->forge->addForeignKey('id_category', 'category_product');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
