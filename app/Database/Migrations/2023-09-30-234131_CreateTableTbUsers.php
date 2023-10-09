<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTbUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true,
                'auto_increment'=> true,
            ],
            'nama_lengkap' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100'
            ],
            'email' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'alamat' => [
                'type'          => 'TEXT',
            ],
            'no_hp' => [
                'type'          => 'VARCHAR',
                'constraint'    => '15'
            ],
            'photo_profile' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'default'       => 'default_images.jpeg'
            ],
            'id_role' => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->addKey('email', false, true);
        $this->forge->addKey('no_hp', false, true);
        $this->forge->addForeignKey('id_role', 'tb_role', 'id_role', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_users');
    }

    public function down()
    {
        $this->forge->dropTable('tb_users');
    }
}
