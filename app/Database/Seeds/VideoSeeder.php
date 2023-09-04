<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        // protected $allowedFields = ['judul_video', 'link'];
        $data = [
            [
                'judul_video' => 'Video',
                'link' => 'https://www.youtube.com/embed/5qap5aO4i9A'
            ]
        ];

        $this->db->table('tb_video')->insertBatch($data);
    }
}
