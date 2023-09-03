<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GaleriFotoModel;

class GaleriFotoController extends BaseController
{
    protected $GaleriFotoModel;

    public function __construct()
    {
        $this->GaleriFotoModel = new GaleriFotoModel();
    }

    public function index()
    {
        $gallery = $this->GaleriFotoModel->findAll();
        $data = [
            'title' => 'Galeri Foto',
            'gallery' => $gallery
        ];
        return view('galleryphoto/index', $data);
    }
    public function page_gallery()
    {
        $gallery = $this->GaleriFotoModel->getCarousel();
        $data = [
            'title' => 'Galeri Foto',
            'gallery' => $gallery
        ];
        return view('landingpage/page-gallery', $data);
    }

    public function detail($judul_foto)
    {
        $gallery = $this->GaleriFotoModel->getFoto($judul_foto);
        $data = [
            'title' => 'Detail Foto',
            'gallery' => $gallery
        ];
        return view('galleryphoto/detail', $data);
    }

    public function active($id)
    {
        $GaleriFotoModel = new GaleriFotoModel();

        // Ambil data foto berdasarkan ID
        $photo = $GaleriFotoModel->find($id); // Ganti dengan metode yang sesuai di model

        if ($photo) {
            // Jika foto ditemukan, ubah nilai atribut carousel menjadi 1
            $data = ['carousel' => 1];
            $GaleriFotoModel->update($id, $data);


            return redirect()->to(base_url('foto'))->with('success', 'Atribut carousel telah diubah.');
        } else {
            return redirect()->to(base_url('foto'))->with('error', 'Foto tidak ditemukan.');
        }
    }

    public function deactive($id)
    {
        $GaleriFotoModel = new GaleriFotoModel();

        // Ambil data foto berdasarkan ID
        $photo = $GaleriFotoModel->find($id); // Ganti dengan metode yang sesuai di model

        if ($photo) {
            // Jika foto ditemukan, ubah nilai atribut carousel menjadi 0
            $data = ['carousel' => 0];
            $GaleriFotoModel->update($id, $data);

            return redirect()->to(base_url('foto'))->with('success', 'Atribut carousel telah diubah.');
        } else {
            return redirect()->to(base_url('foto'))->with('error', 'Foto tidak ditemukan.');
        }
    }


    public function create()
    {
        $data = [
            'title' => 'Tambah Foto',
            'validation' => \Config\Services::validation()
        ];
        return view('galleryphoto/create', $data);
    }

    public function save()
    {
        // validasi input
        $validationRules = [
            'judul_foto' => [
                'rules ' => 'required',
                'errors' => [
                    'required' => 'Judul Foto harus diisi',
                ]
            ],
            'nama_foto' => [
                'rules' => 'max_size[nama_foto,2048]|is_image[nama_foto]|mime_in[nama_foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'File yang diupload bukan foto',
                    'mime_in' => 'File yang diupload bukan foto'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        }


        $judulFoto = $this->request->getVar('judul_foto');
        $uploadedFile = $this->request->getFile('nama_foto');

        // Ukuran gambar yang diinginkan
        $targetWidth = 1600;
        $targetHeight = 1200;

        // Buat gambar baru dengan ukuran yang diinginkan
        $newImage = imagecreatetruecolor($targetWidth, $targetHeight);

        // Ubah gambar asli menjadi gambar GD
        $sourceImage = imagecreatefromstring(file_get_contents($uploadedFile->getTempName()));

        // Interpolasi untuk peningkatan ukuran
        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $targetWidth, $targetHeight, imagesx($sourceImage), imagesy($sourceImage));

        // Simpan gambar yang sudah diubah ukurannya
        $imagePath = ROOTPATH . 'public/uploads/' . $uploadedFile->getName();
        imagejpeg($newImage, $imagePath);

        imagedestroy($sourceImage);
        imagedestroy($newImage);
        $data = [
            'judul_foto' => $judulFoto,
            'nama_foto' => $this->request->getFile('nama_foto')->getName(),
            'deskripsi' => $this->request->getVar('deskripsi')
        ];

        if ($this->GaleriFotoModel->insert($data)) {
            //pindah ke 
            $this->request->getFile('nama_foto')->move(ROOTPATH . 'public/uploads');
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('errors', 'Data gagal ditambahkan');
        }

        return redirect()->to('/foto');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Edit Foto',
            'validation' => \Config\Services::validation(),
            'gallery' => $this->GaleriFotoModel->get_photo_by_id($id)
        ];
        return view('galleryphoto/edit', $data);
    }

    public function update($id)
    {
        $validationRules = [
            'judul_foto' => [
                'rules ' => 'required',
                'errors' => [
                    'required' => 'Judul Foto harus diisi',
                ]
            ],
            'nama_foto' => [
                'rules' => 'max_size[nama_foto,2048]|is_image[nama_foto]|mime_in[nama_foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'File yang diupload bukan foto',
                    'mime_in' => 'File yang diupload bukan foto'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $judulFoto = $this->request->getVar('judul_foto');
        $uploadedFile = $this->request->getFile('nama_foto');

        // Jika gambar baru diunggah
        if ($uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
            // Ukuran gambar yang diinginkan
            $targetWidth = 1600;
            $targetHeight = 1200;

            // Buat gambar baru dengan ukuran yang diinginkan
            $newImage = imagecreatetruecolor($targetWidth, $targetHeight);

            // Ubah gambar asli menjadi gambar GD
            $sourceImage = imagecreatefromstring(file_get_contents($uploadedFile->getTempName()));

            // Interpolasi untuk peningkatan ukuran
            imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $targetWidth, $targetHeight, imagesx($sourceImage), imagesy($sourceImage));

            // Simpan gambar yang sudah diubah ukurannya
            $imagePath = ROOTPATH . 'public/uploads/' . $uploadedFile->getName();
            imagejpeg($newImage, $imagePath);

            imagedestroy($sourceImage);
            imagedestroy($newImage);
        }

        // Update data dalam basis data
        $data = [
            'judul_foto' => $judulFoto,
            'deskripsi' => $this->request->getVar('deskripsi')
        ];

        if ($uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
            $data['nama_foto'] = $uploadedFile->getName();
        }

        // Lakukan pembaruan data
        if ($this->GaleriFotoModel->update($id, $data)) {
            session()->setFlashdata('pesan', 'Data berhasil diperbarui');
        } else {
            session()->setFlashdata('errors', 'Data gagal diperbarui');
        }
        return redirect()->to('/foto');
    }

    public function delete($id)
    {
        $photo = $this->GaleriFotoModel->get_photo_by_id($id);

        // Hapus foto dari direktori
        unlink(ROOTPATH . 'public/uploads/' . $photo['nama_foto']);

        // Hapus data dari basis data
        $this->GaleriFotoModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/foto');
    }






}