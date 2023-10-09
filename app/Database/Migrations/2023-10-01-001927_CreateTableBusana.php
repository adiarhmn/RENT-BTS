<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBusana extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_busana'   => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'nama_busana' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'deskripsi'   => [
                'type'          => 'TEXT',
            ],
            'harga_sewa'  => [
                'type'          => 'DECIMAL',
                'constraint'    => '12,2'
            ],
            'id_jenis'=> [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true
            ],
            'created_at' => [
                'type'          => 'DATETIME',
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_busana', true);
        $this->forge->addForeignKey('id_jenis', 'tb_jenis_busana', 'id_jenis', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_busana');
    }

    public function down()
    {
        $this->forge->dropTable('tb_busana');
    }
}
