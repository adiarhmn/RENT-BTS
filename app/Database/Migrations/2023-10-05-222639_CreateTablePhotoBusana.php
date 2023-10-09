<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePhotoBusana extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_photoBusana' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'photo_busana' => [
                'type'              => 'VARCHAR',
                'constraint'        => 200,
            ],
            'id_busana' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'null'              => true
            ],
            'id_paket' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'null'              => true
            ]
        ]);

        $this->forge->addKey('id_photoBusana', true);
        $this->forge->addForeignKey('id_busana', 'tb_busana', 'id_busana', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_paket', 'tb_paket', 'id_paket', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_photoBusana');
    }

    public function down()
    {
        $this->forge->dropTable('tb_photoBusana');
    }
}
