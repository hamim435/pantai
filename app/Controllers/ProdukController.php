<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Controllers\BaseController;
use App\Models\KontakModel;
use App\Models\PengaturanModel;
use App\Models\GaleriFotoModel;
use CodeIgniter\Config\Services;

class ProdukController extends BaseController
{
    protected $produk;
    protected $pengaturanModel;
    protected $kontakModel;
    protected $galeriFotoModel;

    public function __construct()
    {
        $this->produk = new ProdukModel();
        $this->pengaturanModel = new PengaturanModel();
        $this->kontakModel = new KontakModel();
        $this->galeriFotoModel = new GaleriFotoModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Produk',
            'produk' => $this->produk->findAll(),
        ];
        return view('produk/index', $data);
    }

    public function pageProduk($jenis = null)
{
    $search = $this->request->getGet('search');

    if ($jenis) {
        // Filter berdasarkan jenis produk dan pencarian
        $produk = $this->produk->like('jenis_produk', $jenis)->like('nama_produk', $search)->findAll();
    } elseif ($search) {
        // Filter hanya berdasarkan pencarian
        $produk = $this->produk->like('nama_produk', $search)->findAll();
    } else {
        // Tampilkan semua produk jika tidak ada filter
        $produk = $this->produk->findAll();
    }

    $pengaturan = $this->pengaturanModel->first();
    $kontak = $this->kontakModel->first();
    $galleries = $this->galeriFotoModel->getFoto();

    $data = [
        'title' => 'Produk',
        'produk' => $produk,
        'pengaturan' => $pengaturan,
        'kontak' => $kontak,
        'galleries' => $galleries,
    ];

    return view('landingpage/pageProduk', $data);
}

    

    public function create()
    {
        $data = ['title' => 'Tambah Produk'];
        return view('produk/tambah', $data);
    }

    public function economy(){

    $pengaturan = $this->pengaturanModel->first();
    $kontak = $this->kontakModel->first();
    $galleries = $this->galeriFotoModel->getFoto();
    $produk = $this->produk->findAll();
    $data = [
        'title' => 'Produk',
        'produk' => $produk,
        'pengaturan' => $pengaturan,
        'kontak' => $kontak,
        'galleries' => $galleries,
    ];
        return view('landingpage/economy',$data);
    }

    public function store()
    {
        $foto = $this->request->getFile('foto');
        $fotoName = $foto->getRandomName();
        $foto->move('uploads', $fotoName);

        $this->produk->save([
            'foto' => $fotoName,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'jenis_produk' => $this->request->getPost('jenis_produk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'pemilik_produk' => $this->request->getPost('pemilik_produk'),
        ]);
        return redirect()->to('/produk')->with('success', 'Data produk berhasil diubah.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Produk',
            'produk' => $this->produk->find($id),
        ];

        return view('produk/edit', $data);
    }

    public function update($id)
    {
        $produk = $this->produk->find($id);
        $foto = $this->request->getFile('foto');
        $fotoName = $produk['foto']; // Default to existing file name

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('uploads', $fotoName);

            // Hapus foto lama
            if (is_file('uploads/' . $produk['foto'])) {
                unlink('uploads/' . $produk['foto']);
            }
        }

        $this->produk->update($id, [
            'foto' => $fotoName,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'jenis_produk' => $this->request->getPost('jenis_produk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'pemilik_produk' => $this->request->getPost('pemilik_produk'),
        ]);

        return redirect()->to('/produk')->with('success', 'Data produk berhasil diubah.');
    }

    public function delete($id)
    {
        $produk = $this->produk->find($id);

        if ($produk) {
            // Hapus foto
            if (is_file('uploads/' . $produk['foto'])) {
                unlink('uploads/' . $produk['foto']);
            }
            $this->produk->delete($id);
        }

        return redirect()->to('/produk')->with('success', 'Data produk berhasil dihapus.');
    }
}
