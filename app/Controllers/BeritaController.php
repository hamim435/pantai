<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KontakModel;
use App\Models\PengaturanModel;
use App\Models\GaleriFotoModel;
use CodeIgniter\Config\Services;

class BeritaController extends BaseController
{
    protected $beritaModel;
    protected $pengaturanModel;
    protected $kontakModel;
    protected $GaleriFotoModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->pengaturanModel = new PengaturanModel();
        $this->kontakModel = new KontakModel();
        $this->GaleriFotoModel = new GaleriFotoModel();
    }

    public function pageNews()
    {
        $berita = $this->beritaModel->findAll();
        $pengaturan = $this->pengaturanModel->first();
        $galleries = $this->GaleriFotoModel->getFoto();
        // $link = $this->linkModel->getLink();
        $kontak = $this->kontakModel->first();
        $data = [
            'title' => 'Berita',
            'berita' => $berita,
            'pengaturan' => $pengaturan,
            'galleries' => $galleries,
            // 'link' => $link,
            'kontak' => $kontak
        ];

        return view('landingpage/pagenews', $data);
    }

    public function pageDetailNews($slug)
    {
        $berita = $this->beritaModel->getBySlug($slug);
    
        // Mendapatkan semua kategori berita unik
        $categories = $this->beritaModel->getCategoriesBySlug($slug);
    
        $pengaturan = $this->pengaturanModel->first();
        $kontak = $this->kontakModel->first();
        $galleries = $this->GaleriFotoModel->getFoto();
    
        $days = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        $months = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    
        $updated_at = strtotime($berita['updated_at']);
        $day_name = $days[date('w', $updated_at)];
        $month_name = $months[date('n', $updated_at)];
    
        $formatted_date = $day_name . ', ' . date('d', $updated_at) . ' ' . $month_name . ' ' . date('Y H:i', $updated_at);
    
        $data = [
            'title' => 'Berita ' . ucwords(strtolower($berita['judul_berita'])),
            'berita' => $berita,
            'categories' => $categories, // Mengirim semua kategori berita ke view
            'pengaturan' => $pengaturan,
            'formatted_date' => $formatted_date,
            'galleries' => $galleries,
            'kontak' => $kontak
        ];
    
        return view('landingpage/detailpagenews', $data);
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
                ->fit(750, 350)
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
                ->fit(750, 350) // Resize the image to your desired dimensions
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
