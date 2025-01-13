<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengaturanModel;

class PengaturanController extends BaseController
{

    protected $PengaturanModel;

    public function __construct()
    {
        $this->PengaturanModel = new PengaturanModel();
    }

    public function index()
    {
        $pengaturan = $this->PengaturanModel->first();

        $data = [
            'title' => 'Data Desa',
            'validation' => \Config\Services::validation(),
            'pengaturan' => $pengaturan
        ];

        return view('pengaturan/index', $data);
    }



    public function update()
    {
        $validationRules = [
            'nama_wisata' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Wisata harus diisi.'
                ]
            ],
            'profil_wisata' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Profil Wisata harus diisi.'
                ]
            ],
            'titik_koordinator' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Titik Koordinat harus diisi.'
                ]
            ],
            'hari' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hari harus diisi.'
                ]
            ],
            'waktu_bisnis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu Bisnis harus diisi.'
                ]
            ],

        ];

        // Jika logo_wisata di-upload, tambahkan aturan validasi untuk file gambar
        if ($this->request->getFile('logo_wisata') !== null && $this->request->getFile('logo_wisata')->isValid()) {
            $validationRules['logo_wisata'] = 'uploaded[logo_wisata]|max_size[logo_wisata,2048]|ext_in[logo_wisata,png,jpg,jpeg]';
        }

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_wisata' => $this->request->getVar('nama_wisata'),
            'profil_wisata' => $this->request->getVar('profil_wisata'),
            'titik_koordinator' => $this->request->getVar('titik_koordinator'),
            'hari' => $this->request->getVar('hari'),
            'waktu_bisnis' => $this->request->getVar('waktu_bisnis'),
        ];

        // Jika logo_wisata di-upload, simpan file dan update kolom logo_wisata
        if ($this->request->getFile('logo_wisata') !== null && $this->request->getFile('logo_wisata')->isValid()) {
            $logoDesa = $this->request->getFile('logo_wisata');
            $newName = $logoDesa->getRandomName();
            $logoDesa->move(ROOTPATH . '../public_html/uploads', $newName);

            // Hapus data logo_wisata yang sudah ada sebelumnya
            $existingData = $this->PengaturanModel->find(1);
            $existingLogoPath = ROOTPATH . '../public_html/uploads/' . $existingData['logo_wisata'];
            if (file_exists($existingLogoPath)) {
                unlink($existingLogoPath);
            }

            $data['logo_wisata'] = $newName;
        }

        if ($this->PengaturanModel->update(1, $data)) {
            return redirect()->to('/settings')->with('success', 'Data berhasil diperbarui!');
        } else {
            return redirect()->to('/settings')->with('error', 'Data gagal diperbarui.');
        }
    }





}