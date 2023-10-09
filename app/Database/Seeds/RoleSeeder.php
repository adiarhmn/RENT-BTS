<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['role' => 'admin'],
            ['role' => 'petugas'],
            ['role' => 'penyewa'],
        ];

        $this->db->table('tb_role')->insertBatch($data);
    }
}
