<?php

namespace App\Controllers;

use App\Models\GaleriFotoModel;
use App\Models\VideoModel;
use App\Models\BeritaModel;
use App\Models\PengaturanModel;
use App\Controllers\BaseController;

class BerandaController extends BaseController
{
    public function __construct()
    {
        $this->GaleriFotoModel = new GaleriFotoModel();
        $this->VideoModel = new VideoModel();
        $this -> BeritaModel = new BeritaModel();
        $this -> PengaturanModel = new PengaturanModel();
    }

    protected $GaleriFotoModel;
    protected $VideoModel;
    protected $BeritaModel;
    protected $PengaturanModel;

    public function index()
    {
        $gallery = $this->GaleriFotoModel->getCarousel();
        $galleries = $this->GaleriFotoModel->getFoto();
        $berita = $this->BeritaModel->findAll();
        $video = $this->VideoModel->findAll();

        // dd($gallery);
        $data = [
            'gallery' => $gallery,
            'galleries' => $galleries,
            'berita' => $berita,
            'video' => $video,
            'title' => 'Beranda'
        ];
        return view('landingpage/index', $data);
    }

    public function page_tentang()
    {
        $pengaturan = $this->PengaturanModel->first();
        $data = [
            'title' => 'Tentang Kami',
            'pengaturan' => $pengaturan,
        ];
        return view('landingpage/pageAbout', $data);
    }
}