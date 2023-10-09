<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lengkap' => 'Adi Aulia Rahman',
                'email'        => 'adiaulia@gmail.com',
                'password'     => '$2y$10$jLDXcd5d2I8W5T2mKy.YyOvw/gsiEvxKMy62xqdr2MWsXnWRYZFmK',
                'alamat'       => 'Pelaihari, Angsau',
                'no_hp'        => '08811918211',
                'photo_profile'=> 'default_images.jpeg',
                'id_role'      => 1,
            ],
            [
                'nama_lengkap' => 'Admin',
                'email'        => 'admin@gmail.com',
                'password'     => '$2y$10$jLDXcd5d2I8W5T2mKy.YyOvw/gsiEvxKMy62xqdr2MWsXnWRYZFmK',
                'alamat'       => 'Pelaihari, Angsau',
                'no_hp'        => '08811918222',
                'photo_profile'=> 'default_images.jpeg',
                'id_role'      => 1,
            ],
        ];

        $this->db->table('tb_users')->insertBatch($data);
    }
}
