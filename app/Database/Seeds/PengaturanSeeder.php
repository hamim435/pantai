<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    public function run()
    {
        // ['nama_wisata', 'profil_wisata', 'titik_koordinator', 'hari', 'waktu_bisnis', 'logo_wisata'];

        $data = [
            [
                'nama_wisata' => 'Taman Wisata Alam Tanah Laut',
                'profil_wisata' => ' Taman Wisata Alam Tanah Laut adalah sebuah tempat wisata yang berada di Kabupaten Tanah Laut, Kalimantan Selatan, Indonesia. Tempat wisata ini berada di Desa Sungai Rangas, Kecamatan Pelaihari, Kabupaten Tanah Laut. Taman Wisata Alam Tanah Laut memiliki luas sekitar 1.000 hektare. Tempat wisata ini memiliki berbagai macam jenis flora dan fauna. Tempat wisata ini juga memiliki beberapa fasilitas seperti kolam renang, kolam pancing, dan lain-lain.',
                'titik_koordinator' => '-6.106667, 106.761944',
                'hari' => 'Senin - Minggu',
                'waktu_bisnis' => '08.00 - 17.00',
                'logo_wisata' => 'logo.png'
            ]
        ];

        $this->db->table('tb_pengaturan')->insertBatch($data);
    }
}
