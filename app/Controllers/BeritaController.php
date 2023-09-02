<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use CodeIgniter\Config\Services;

class BeritaController extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $berita = $this->beritaModel->findAll();
        
        $data = [
            'title' => 'Berita',
            'berita' => $berita,
            
        ];

        return view('berita/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Berita',
            'validation' => \Config\Services::validation()
        ];

        return view('berita/tambah', $data);
    }
    public function save()
    {
        $validationRules = [
            'judul_berita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul berita harus diisi.'
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi berita harus diisi.'
                ]
            ],
            'kategori_berita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori berita harus diisi.'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]',
                'errors' => [
                    'uploaded' => 'Pilih file gambar untuk foto.',
                    'max_size' => 'Ukuran file gambar maksimal 2MB.',
                    'is_image' => 'File harus berupa gambar (jpg, jpeg, png, gif).'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $judulBerita = $this->request->getVar('judul_berita');
        $slug = url_title($judulBerita, '-', true);

        $image = $this->request->getFile('foto');

        // Check if an image was uploaded
        if ($image->isValid()) {
            $imagePath = ROOTPATH . 'public/uploads/';

            // Generate a unique file name
            $newName = $image->getRandomName();

            // Move the uploaded file
            $image->move($imagePath, $newName);

            $image = Services::image()
                ->withFile($imagePath . $newName)
                ->fit(600, 400)
                ->save($imagePath . $newName);

            $data = [
                'slug' => $slug,
                'judul_berita' => $judulBerita,
                'isi' => $this->request->getVar('isi'),
                'kategori_berita' => $this->request->getVar('kategori_berita'),
                'foto' => $newName, // Save the new image name
            ];
        } else {
            // Handle the case when no new image is uploaded
            $data = [
                'slug' => $slug,
                'judul_berita' => $judulBerita,
                'isi' => $this->request->getVar('isi'),
                'kategori_berita' => $this->request->getVar('kategori_berita'),
            ];
        }

        if ($this->beritaModel->insert($data)) {
            session()->setFlashdata('success', 'Data Berita Berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data berita.');
        }

        return redirect()->to('/berita');
    }

    public function edit($id)
    {
        $berita = $this->beritaModel->find($id);
        if (!$berita) {
            return redirect()->to('/berita')->with('error', 'Berita not found.');
        }

        $data = [
            'title' => 'Edit Berita',
            'validation' => \Config\Services::validation(),
            'berita' => $berita
        ];

        return view('berita/edit', $data);
    }

    public function update($id)
    {
        $validationRules = [
            'judul_berita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul berita harus diisi.'
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi berita harus diisi.'
                ]
            ],
            'kategori_berita' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori berita harus diisi.'
                ]
            ]
        ];

        // Check if a new photo is uploaded
        if ($this->request->getFile('foto')->isValid()) {
            $validationRules['foto'] = [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]',
                'errors' => [
                    'uploaded' => 'Pilih file gambar untuk foto.',
                    'max_size' => 'Ukuran file gambar maksimal 2MB.',
                    'is_image' => 'File harus berupa gambar (jpg, jpeg, png, gif).'
                ]
            ];
        }

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $berita = $this->beritaModel->find($id);
        if (!$berita) {
            return redirect()->to('/berita')->with('error', 'Berita not found.');
        }

        $judulBerita = $this->request->getVar('judul_berita');
        $slug = url_title($judulBerita, '-', true);

        $data = [
            'slug' => $slug,
            'judul_berita' => $judulBerita,
            'isi' => $this->request->getVar('isi'),
            'kategori_berita' => $this->request->getVar('kategori_berita'),
        ];

        // Check if a new photo is uploaded
        if ($this->request->getFile('foto')->isValid()) {
            $imagePath = ROOTPATH . 'public/uploads/';

            // Generate a unique file name
            $newName = $this->request->getFile('foto')->getRandomName();

            // Move the uploaded file
            $this->request->getFile('foto')->move($imagePath, $newName);

            // Perform image manipulation (e.g., resizing)
            $image = Services::image()
                ->withFile($imagePath . $newName)
                ->fit(600, 400) // Resize the image to your desired dimensions
                ->save($imagePath . $newName);

            $data['foto'] = $newName; // Save the new image name
        }

        if ($this->beritaModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data Berita Berhasil diupdate!');
        } else {
            session()->setFlashdata('error', 'Gagal mengupdate data berita.');
        }

        return redirect()->to('/berita');
    }

    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);
        if (!$berita) {
            return redirect()->to('/berita')->with('error', 'Berita not found.');
        }

        if ($this->beritaModel->delete($id)) {
            session()->setFlashdata('success', 'Data Berita Berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data berita.');
        }

        return redirect()->to('/berita');
    }
}
