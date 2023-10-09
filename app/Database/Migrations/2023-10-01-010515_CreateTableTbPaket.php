<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTbPaket extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_paket'  => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'nama_paket'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '50'
            ],
            'deskripsi_paket' => [
                'type'          => 'TEXT'
            ],
            'harga_paket'   => [
                'type'          => 'DECIMAL',
                'constraint'    => '12,2',
            ],
            'photo_paket'   => [
                'type'          => 'TEXT',
                'null'          => true
            ],
        ]);
        $this->forge->addKey('id_paket', true);
        $this->forge->createTable('tb_paket');
    }

    public function down()
    {
        $this->forge->dropTable('tb_paket');
    }
}
