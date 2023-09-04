<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KontakSeeder extends Seeder
{
    public function run()
    {
        //protected $allowedFields = ['deskripsi_kontak', 'email', 'no_telp', 'alamat'];
        $data = [
            [
                'deskripsi_kontak' => 'Kontak',
                'email' => 'wisata@gmail.com',
                'no_telp' => '08123456789',
                'alamat' => 'Jl. Raya Jember, Kaliwates, Jember, Jawa Timur 68131'
            ]
        ];

        $this->db->table('tb_kontak')->insertBatch($data);
    }
}
