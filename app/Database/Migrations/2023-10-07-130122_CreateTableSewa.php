<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSewa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sewa'   => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true
            ],
            'tanggal_minjam' => [
                'type'          => 'DATE'
            ],
            'tanggal_selesai' => [
                'type'          => 'DATE'
            ],
            'status_sewa'   => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'pesan'    => [
                'type'          => 'TEXT',
                'null'          => true,
            ],
            'jaminan'   => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'deskripsi_sewa'  => [
                'type'          => 'TEXT',
                'null'          => true,
            ],
            'total_bayar'     => [
                'type'          => 'DECIMAL',
                'constraint'    => '12,2'
            ],
            'status_pembayran' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'created_at' => [
                'type'          => 'DATETIME',
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
            ],
            'id_voucher' => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true
            ],
            'id_user'   => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true,
            ],
        ]);

        $this->forge->addKey('id_sewa', true);
        $this->forge->addForeignKey('id_user', 'tb_users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_voucher', 'tb_voucher', 'id_voucher', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_sewa');

    }

    public function down()
    {
        $this->forge->dropTable('tb_sewa');
    }
}
