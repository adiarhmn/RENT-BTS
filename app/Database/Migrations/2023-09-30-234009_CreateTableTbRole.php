<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTbRole extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_role' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'role' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ]
        ]);
        $this->forge->addKey('id_role', true);
        $this->forge->createTable('tb_role');
    }
    public function down()
    {
        $this->forge->dropTable('tb_role');
    }
}
