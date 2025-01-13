<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Data contoh untuk seed
        $data = [
            [
                'nama' => 'Pendi Ganteng',
                'username' => 'Ganteng',
                'password' => password_hash('ganteng', PASSWORD_DEFAULT),
                'role' => 'admin'  // Menambahkan nilai untuk kolom `role`
            ]
        ];

        // Memasukkan data ke tabel `tb_user`
        $this->db->table('tb_user')->insertBatch($data);
    }
}
