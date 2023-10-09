<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUkuran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ukuran' => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'ukuran' => [
                'type'          => 'VARCHAR',
                'constraint'    => 6,
            ],
            'stok'  => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
            ],
            'id_busana' => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true,
                'null'          => true
            ],
            'id_paket' => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true,
                'null'          => true
            ]
        ]);

        $this->forge->addKey('id_ukuran', true);
        $this->forge->addForeignKey('id_busana', 'tb_busana', 'id_busana', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_paket', 'tb_paket', 'id_paket', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_ukuran');
    }
    
    public function down()
    {
        $this->forge->dropTable('tb_ukuran');
    }
}
