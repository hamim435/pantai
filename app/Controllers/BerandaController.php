<?php

namespace App\Controllers;

use App\Models\GaleriFotoModel;
use App\Models\VideoModel;
use App\Models\BeritaModel;
use App\Models\PengaturanModel;
use App\Models\KontakModel;
use App\Controllers\BaseController;

class BerandaController extends BaseController
{

    protected $GaleriFotoModel;
    protected $VideoModel;
    protected $BeritaModel;
    protected $PengaturanModel;
    protected $KontakModel;

    public function __construct()
    {
        $this->GaleriFotoModel = new GaleriFotoModel();
        $this->VideoModel = new VideoModel();
        $this -> BeritaModel = new BeritaModel();
        $this -> PengaturanModel = new PengaturanModel();
        $this -> KontakModel = new KontakModel();
    }



    public function index()
    {
        $gallery = $this->GaleriFotoModel->getCarousel();
        $galleries = $this->GaleriFotoModel->getFoto();
        $berita = $this->BeritaModel->findAll();
        $video = $this->VideoModel->findAll();
        $kontak = $this->KontakModel->first();

        // dd($gallery);
        $data = [
            'gallery' => $gallery,
            'galleries' => $galleries,
            'berita' => $berita,
            'video' => $video,
            'kontak' => $kontak,
            'title' => 'Beranda'
        ];
        return view('landingpage/index', $data);
    }

    public function page_tentang()
    {
        $pengaturan = $this->PengaturanModel->first();
        $galleries = $this->GaleriFotoModel->getFoto();
        $kontak = $this->KontakModel->first();
        $data = [
            'title' => 'Tentang Kami',
            'pengaturan' => $pengaturan,
            'galleries' => $galleries,
            'kontak' => $kontak,
        ];
        return view('landingpage/pageAbout', $data);
    }

    public function footer()
    {
        $pengaturan = $this->PengaturanModel->first();
        $galleries = $this->GaleriFotoModel->getFoto();
        $kontak = $this->KontakModel->first();
        $data = [
            'title' => 'Tentang Kami',
            'pengaturan' => $pengaturan,
            'galleries' => $galleries,
            'kontak' => $kontak,
        ];
        return view('templates_lp/footer', $data);
    }
    
}