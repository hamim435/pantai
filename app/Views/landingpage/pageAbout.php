<?= $this->extend('templates_lp/main'); ?>

<?= $this->section('content'); ?>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>About Us</h3>
                        <p>Pixel perfect design with awesome contents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
    
    <div class="about_story">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="story_heading">
                        <h3><?= $pengaturan['nama_wisata'] ?></h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-11 offset-lg-1">
                            <div class="story_info">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <p><?= $pengaturan['profil_wisata'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="story_thumb">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="thumb padd_1">
                                            <img src="img/about/1.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="thumb">
                                            <img src="img/about/2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="counter_wrap">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_counter text-center">
                                            <h3  class="counter">378</h3>
                                            <p>Tour has done successfully</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_counter text-center">
                                            <h3 class="counter">30</h3>
                                            <p>Yearly tour arrange</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_counter text-center">
                                            <h3 class="counter">2263</h3>
                                            <p>Happy Clients</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Row for cards -->
      <!DOCTYPE html>  
<html lang="id">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <style>  
        body {  
            background-color: #f8f9fa; /* Warna latar belakang halaman */  
        }  

        .card {  
            background-color:rgb(82, 207, 153); /* Warna latar belakang kartu */  
            color: white; /* Warna teks di dalam kartu */  
            border: none; /* Hapus border default */  
        }  

        .card:hover {  
            background-color:rgb(56, 104, 175); /* Warna kartu saat hover */  
            transition: background-color 0.3s ease; /* Transisi saat hover */  
        }  

        .btn-primary {  
            background-color:rgb(230, 238, 233); /* Warna tombol utama */  
            border-color:rgb(253, 253, 253); /* Warna border tombol utama */  
        }  

        .btn-secondary {  
            background-color:rgb(240, 246, 242); /* Warna tombol sekunder */  
            border-color:rgb(241, 241, 242); /* Border warna tombol sekunder */  
        }  

        .btn-secondary:hover {  
            background-color:rgb(232, 238, 243); /* Warna tombol sekunder saat hover */  
        }  

        /* Gaya submenu */  
        .submenu {  
            display: none; /* Mulai sembunyikan submenu */  
            position: absolute; /* Lepaskan submenu */  
            left: 0;  
            right: 0;  
            background-color:rgb(43, 118, 198); /* Warna latar belakang submenu */  
            padding: 10px 0; /* Padding untuk submenu */  
            z-index: 10; /* Pastikan submenu di atas */  
        }  

        .btn-secondary:hover .submenu {  
            display: block; /* Tampilkan submenu saat hover tombol */  
        }  

        .submenu li {  
            list-style: none; /* Hapus bullet */  
        }  

        .submenu li a {  
            color: #ffffff; /* Warna teks link submenu */  
            padding: 10px 20px; /* Padding untuk item submenu */  
            display: block; /* Menjadikan link penuh */  
        }  

        .submenu li a:hover {  
            background-color: #0056b3; /* Warna submenu saat hover */  
        }  
    </style>  
</head>  

<body>  
    <div class="container mt-3">  
        <div class="row g-3">      
    <div class="col-sm-6 col-lg-3">  
                <div class="card h-100 shadow">  
                    <div class="card-body text-center">  
                        <button class="btn btn-secondary w-100">  
                            <a href="#" class="text-dark text-decoration-none">  
                                Galeri <i class="ti-angle-down"></i>  
                            </a>  
                            <ul class="submenu">  
                                <li><a href="/page-gallery">Galeri Foto</a></li>  
                                <li><a href="/halaman-galeri-video">Galeri Video</a></li>  
                            </ul>  
                        </button>  
                    </div>  
                </div>  
            </div>  
            <!-- Card 3 -->  
            <div class="col-sm-6 col-lg-3">  
                <div class="card h-100 shadow">  
                    <div class="card-body text-center">  
                        <button class="btn btn-secondary w-100">  
                            <a href="#" class="text-dark text-decoration-none">  
                                Berita <i class="ti-angle-down"></i>  
                            </a>  
                            <ul class="submenu">  
                                <li><a href="/halaman-berita">Berita Terbaru</a></li>  
                            </ul>  
                        </button>  
                    </div>  
                </div>  
            </div>  
            <!-- Card 4 -->  
            <div class="col-sm-6 col-lg-3">  
                <div class="card h-100 shadow">  
                    <div class="card-body text-center">  
                        <button class="btn btn-secondary w-100">  
                            <a href="/produk" class="text-dark text-decoration-none">Kuliner Wisata</a>  
                        </button>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  

<?= $this->endSection(); ?>