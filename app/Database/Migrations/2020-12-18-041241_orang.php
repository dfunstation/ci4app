<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orang extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_orang'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'alamat' => [
				'type'           => 'TEXT',
				'constraint'     => '100',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
			'updated-at' [
				'type' => 'DATETIME',
				'null' => TRUE
			]
		]);
		$this->forge->addKey('id_orang', true);
		$this->forge->createTable('orang');
	}

	public function down()
	{
		$this->forge->dropTable('orang');
	}
}
