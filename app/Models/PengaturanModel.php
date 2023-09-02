<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanModel extends Model
{
    protected $table = 'tb_pengaturan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_wisata', 'profil_wisata', 'titik_koordinator', 'hari', 'waktu_bisnis', 'logo_wisata'];

}