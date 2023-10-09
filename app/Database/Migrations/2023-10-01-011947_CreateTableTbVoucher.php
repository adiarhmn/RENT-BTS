<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTbVoucher extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_voucher'            => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'token_voucher'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'potongan'              => [
                'type'              => 'DECIMAL',
                'constraint'        => '2,1'
            ],
            'nama_voucher'          => [
                'type'              => 'VARCHAR',
                'constraint'        => '70',
            ],
            'jumlah_voucher'        => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ]        
        ]);
        $this->forge->addKey('token_voucher', false, true);
        $this->forge->addKey('id_voucher', true);
        $this->forge->createTable('tb_voucher');
    }

    public function down()
    {
        $this->forge->dropTable('tb_voucher');
    }
}
