<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTbPaketBusana extends Migration
{
    public function up()
    {
        // $this->forge->addField([
        //     'id_paketBusana'   => [
        //         'type'          => 'BIGINT',
        //         'constraint'    => 20,
        //         'unsigned'      => true,
        //         'auto_increment'=> true
        //     ],
        //     'id_busana'         => [
        //         'type'          => 'BIGINT',
        //         'constraint'    => 20,
        //         'unsigned'      => true,
        //     ],
        //     'id_paket'          => [
        //         'type'          => 'BIGINT',
        //         'constraint'    => 20,
        //         'unsigned'      => true,
        //     ]
        // ]);
        // $this->forge->addForeignKey('id_busana','tb_busana', 'id_busana', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_paket', 'tb_paket', 'id_paket', 'CASCADE', 'CASCADE');
        // $this->forge->addKey('id_paketBusana', true);
        // $this->forge->createTable('tb_paketbusana');
    }

    public function down()
    {
        // $this->forge->dropTable('tb_paketbusana');
    }
}
