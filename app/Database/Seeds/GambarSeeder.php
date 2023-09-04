<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GambarSeeder extends Seeder
{
    public function run()
    {
        // protected $allowedFields = ['judul_foto', 'nama_foto', 'deskripsi', 'carousel'];
        $data = [
            [
                'judul_foto' => '1',
                'nama_foto' => '1.jpg',
                'deskripsi' => 'foto 1',
                'carousel' => '1'
            ]
        ];

        $this->db->table('tb_gambar')->insertBatch($data);
    }
}
