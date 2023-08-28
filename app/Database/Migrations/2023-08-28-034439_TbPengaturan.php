<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPengaturan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'nama_wisata'       => ['type' => 'VARCHAR', 'constraint' => '100'],
            'profil_wisata'    => ['type' => 'TEXT'],
            'titik_koordinator' => ['type' => 'VARCHAR', 'constraint' => 255],
            'hari'            => ['type' => 'VARCHAR', 'constraint' => 50], // Tambahkan atribut hari
            'waktu_bisnis'    => ['type' => 'VARCHAR', 'constraint' => 100], // Tambahkan atribut waktu_bisni
            'logo_wisata'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_pengaturan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pengaturan');
    }
}
