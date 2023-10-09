<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTabelReview extends Migration
{
  public function up()
  {
    $this->forge->addfield([
      'id_review' => [
        'type'            => 'BIGINT',
        'constraint'      => 20,
        'unsigned'        => true,
        'auto_increment'  => true,
      ],

      'id_sewa' => [
        'type'            => 'BIGINT',
        'constraint'      => 20,
        'unsigned'        => true,
      ],

      'rate' => [
        'type'            => 'INT',
        'constraint'      => 11,
        'default'         => 0,
      ],
      'review' => [
        'type'            => 'TEXT'
      ],
    ]);

    $this->forge->addKey('id_review', true);
    $this->forge->addForeignKey('id_sewa', 'tb_sewa', 'id_sewa', 'CASCADE', 'CASCADE');
    $this->forge->createTable('tb_review');
  }

  public function down()
  {
    $this->forge->dropTable('tb_review');
  }
}
