<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KontakModel;
use App\Models\GaleriFotoModel;


class KontakController extends BaseController
{

    protected $KontakModel;
    protected $GaleriFotoModel;

    public function __construct()
    {
        $this->KontakModel = new KontakModel();
        $this->GaleriFotoModel = new GaleriFotoModel();
    }

    public function index()
    {
        $kontak = $this->KontakModel->findAll();
        $data = [
            'title' => 'Kelola Kontak',
            'kontak' => $kontak,
        ];
        return view('kontak/index', $data);

    }

    public function pageKontak()
    {
        $galleries = $this->GaleriFotoModel->getFoto();
        $kontak = $this->KontakModel->first();
        // dd($kontak);
        $data = [
            'title' => 'Kontak',
            'galleries' => $galleries,
            'kontak' => $kontak,
        ];

        return view('landingpage/pageKontak', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kontak',
            'validation' => \Config\Services::validation(),
        ];
        return view('kontak/tambah', $data);
    }

    public function save()
    {
        $validationRules = [
            'deskripsi_kontak' => 'required',
            'email' => 'required|valid_email',
            'no_telp' => 'required|numeric',
            'alamat' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/kontak/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'deskripsi_kontak' => $this->request->getPost('deskripsi_kontak'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat')
        ];

        $simpan = $this->KontakModel->save($data);

        if ($simpan) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/kontak');
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->to('/kontak/create');
        }

    }

    public function edit($id)
    {
        $kontak = $this->KontakModel->find($id);
        $data = [
            'title' => 'Edit Kontak',
            'kontak' => $kontak,
            'validation' => \Config\Services::validation(),
        ];
        return view('kontak/edit', $data);
    }

    public function update($id)
    {
        $validationRules = [
            'deskripsi_kontak' => 'required',
            'email' => 'required|valid_email',
            'no_telp' => 'required|numeric',
            'alamat' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/kontak/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'deskripsi_kontak' => $this->request->getPost('deskripsi_kontak'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat')
        ];

        $ubah = $this->KontakModel->update($id, $data);

        if ($ubah) {
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/kontak');
        } else {
            session()->setFlashdata('error', 'Data gagal diubah');
            return redirect()->to('/kontak/edit/' . $id);
        }
    }

    public function delete($id)
    {
        $hapus = $this->KontakModel->delete($id);

        if ($hapus) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/kontak');
        } else {
            session()->setFlashdata('error', 'Data gagal dihapus');
            return redirect()->to('/kontak');
        }
    }
}