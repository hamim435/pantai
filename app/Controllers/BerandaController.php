<?php

namespace App\Controllers;

use App\Models\GaleriFotoModel;
use App\Controllers\BaseController;

class BerandaController extends BaseController
{
    public function __construct()
    {
        $this->GaleriFotoModel = new GaleriFotoModel();
    }


    protected $GaleriFotoModel;

    public function index()
    {
        $gallery = $this->GaleriFotoModel->getCarousel();
        $data = [
            'gallery' => $gallery
        ];
        return view('landingpage/index', $data);
    }
}