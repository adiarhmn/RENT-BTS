<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_jenis' => 'Formal'],
            ['nama_jenis' => 'Adat'],
        ];

        $this->db->table('tb_jenis_busana')->insertBatch($data);
    }
}
