<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'full_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
			'phone' => [
				'type' => 'text',
				'constraint' => '25'
			],
			'document_ci' => [
				'type' => 'text',
				'constraint' => '25'
			],
			'profile_photo' => [
				'type' => 'text',
				'constraint' => '255'
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}