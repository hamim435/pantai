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
    protected $galeriFotoModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->pengaturanModel = new PengaturanModel();
        $this->kontakModel = new KontakModel();
        $this->galeriFotoModel = new GaleriFotoModel();
    }

    /**
     * Halaman daftar berita
     */
    public function index()
    {
        // Ambil semua berita
        $berita = $this->beritaModel->findAll();

        // Ambil berita populer
        $beritaPopuler = $this->beritaModel->orderBy('views', 'DESC')->limit(5)->find();

        // Ambil semua kategori berita
        $kategori = $this->beritaModel->findAll();

        $data = [
            'title' => 'Berita',
            'berita' => $berita,
            'beritaPopuler' => $beritaPopuler,
            'kategori' => $kategori,
        ];

        return view('halaman-berita', $data);
    }

    /**
     * Halaman berita (untuk frontend landing page)
     */
    public function pageNews()
    {
        $berita = $this->beritaModel->findAll();
        $pengaturan = $this->pengaturanModel->first();
        $kontak = $this->kontakModel->first();
        $galleries = $this->galeriFotoModel->getFoto();

        $data = [
            'title' => 'Berita',
            'berita' => $berita,
            'pengaturan' => $pengaturan,
            'kontak' => $kontak,
            'galleries' => $galleries,
        ];

        return view('landingpage/pagenews', $data);
    }

    /**
     * Detail berita
     */
    public function pageDetailNews($slug)
    {
        $berita = $this->beritaModel->getBySlug($slug);

        // Dapatkan semua kategori berita terkait
        $categories = $this->beritaModel->getCategoriesBySlug($slug);

        $pengaturan = $this->pengaturanModel->first();
        $kontak = $this->kontakModel->first();
        $galleries = $this->galeriFotoModel->getFoto();

        // Format tanggal
        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $months = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $updated_at = strtotime($berita['updated_at']);
        $formatted_date = $days[date('w', $updated_at)] . ', ' . date('d', $updated_at) . ' ' . $months[date('n', $updated_at)] . ' ' . date('Y H:i', $updated_at);

        $data = [
            'title' => 'Berita ' . ucwords(strtolower($berita['judul_berita'])),
            'berita' => $berita,
            'categories' => $categories,
            'pengaturan' => $pengaturan,
            'formatted_date' => $formatted_date,
            'galleries' => $galleries,
            'kontak' => $kontak,
        ];

        return view('landingpage/detailpagenews', $data);
    }

    /**
     * Tambah berita
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Berita',
            'validation' => \Config\Services::validation(),
        ];

        return view('berita/tambah', $data);
    }

    /**
     * Simpan berita
     */
    public function save()
    {
        $validationRules = [
            'judul_berita' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul berita harus diisi.'],
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => ['required' => 'Isi berita harus diisi.'],
            ],
            'kategori_berita' => [
                'rules' => 'required',
                'errors' => ['required' => 'Kategori berita harus diisi.'],
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]',
                'errors' => [
                    'uploaded' => 'Pilih file gambar untuk foto.',
                    'max_size' => 'Ukuran file gambar maksimal 2MB.',
                    'is_image' => 'File harus berupa gambar.',
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $judulBerita = $this->request->getVar('judul_berita');
        $slug = url_title($judulBerita, '-', true);

        $image = $this->request->getFile('foto');
        $newName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/uploads/', $newName);

        $this->beritaModel->save([
            'slug' => $slug,
            'judul_berita' => $judulBerita,
            'isi' => $this->request->getVar('isi'),
            'kategori_berita' => $this->request->getVar('kategori_berita'),
            'foto' => $newName,
        ]);

        session()->setFlashdata('success', 'Berita berhasil ditambahkan.');
        return redirect()->to('/berita');
    }

    /**
     * Edit berita
     */
    public function edit($id)
    {
        $berita = $this->beritaModel->find($id);

        if (!$berita) {
            return redirect()->to('/berita')->with('error', 'Berita tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Berita',
            'validation' => \Config\Services::validation(),
            'berita' => $berita,
        ];

        return view('berita/edit', $data);
    }

    /**
     * Update berita
     */
    public function update($id)
    {
        $validationRules = [
            'judul_berita' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul berita harus diisi.'],
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => ['required' => 'Isi berita harus diisi.'],
            ],
            'kategori_berita' => [
                'rules' => 'required',
                'errors' => ['required' => 'Kategori berita harus diisi.'],
            ],
        ];

        if ($this->request->getFile('foto')->isValid()) {
            $validationRules['foto'] = [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]',
                'errors' => [
                    'uploaded' => 'Pilih file gambar.',
                    'max_size' => 'Ukuran file gambar maksimal 2MB.',
                    'is_image' => 'File harus berupa gambar.',
                ],
            ];
        }

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $judulBerita = $this->request->getVar('judul_berita');
        $slug = url_title($judulBerita, '-', true);

        $data = [
            'slug' => $slug,
            'judul_berita' => $judulBerita,
            'isi' => $this->request->getVar('isi'),
            'kategori_berita' => $this->request->getVar('kategori_berita'),
        ];

        if ($this->request->getFile('foto')->isValid()) {
            $image = $this->request->getFile('foto');
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/', $newName);
            $data['foto'] = $newName;
        }

        $this->beritaModel->update($id, $data);
        session()->setFlashdata('success', 'Berita berhasil diperbarui.');
        return redirect()->to('/berita');
    }

    /**
     * Hapus berita
     */
    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);

        if (!$berita) {
            return redirect()->to('/berita')->with('error', 'Berita tidak ditemukan.');
        }

        $this->beritaModel->delete($id);
        session()->setFlashdata('success', 'Berita berhasil dihapus.');
        return redirect()->to('/berita');
    }
}
