<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableJenisBusana extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis' => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true,
                'auto_increment'=> true
            ],
            'nama_jenis' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ]
        ]);
        $this->forge->addKey('id_jenis', true);
        $this->forge->createTable('tb_jenis_busana');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jenis_busana');
    }
}
