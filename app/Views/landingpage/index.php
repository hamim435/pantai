<?= $this->extend('templates_lp/main'); ?>

<?= $this->section('content'); ?>

<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <?php foreach ($gallery as $index => $foto): ?>
            <div class="single_slider <?= $foto['carousel'] == 1 ? 'active' : '' ?>">
                <img class="w-100 h-200" src="<?= base_url('uploads/' . $foto['nama_foto']) ?>" alt="">
                <div class="slider_content">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-md-12">
                                <div class="slider_text text-center">
                                    <h3>
                                        Selamat Datang
                                    </h3>
                                    <p>
                                        Di Website Pariwisata Kabupaten Tanah Laut
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- slider_area_end -->


<!-- where_togo_area_start  -->
<div class="where_togo_area">
    <div class="container">
        <div class="row align-items-center">

        </div>
    </div>
</div>
<!-- where_togo_area_end  -->
<div class="container-xxl py-3 mt-2">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center">
                <div class="section-title-vh">
                    <p class="fs-5 fw-medium fst-italic text-dark" style="margin-bottom: -1px;">DESTINASI POPULER </p>
                    <h1 class="display-6">Berikut adalah destinasi wisata yang ada di Kabupaten Tanah Laut </h1>
                </div>
            </div>
            </div>
        </div>

        <!-- Row for cards -->
        <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Pantai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang halaman */
        }

        .card {
            background-color: rgb(82, 207, 153); /* Warna latar belakang kartu */
            color: white; /* Warna teks di dalam kartu */
            border: none; /* Hapus border default */
            height: 18rem; /* Tinggi kartu */
            text-align: center;
            border-radius: 15px; /* Membuat sudut membulat */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
            transition: transform 0.3s ease; /* Animasi saat hover */
        }

        .card:hover {
            transform: scale(1.05); /* Efek zoom saat hover */
            background-color: rgb(56, 104, 175); /* Warna saat hover */
        }

        .card h5 {
            margin-top: 1rem;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card p {
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }

        .btn-primary {
            background-color: rgb(230, 238, 233); /* Warna tombol utama */
            border-color: rgb(253, 253, 253); /* Warna border tombol utama */
            color: rgb(56, 104, 175); /* Warna teks tombol */
        }

        .btn-primary:hover {
            background-color: rgb(210, 225, 220); /* Warna tombol saat hover */
        }

        .submenu {
            display: none; /* Awalnya sembunyikan submenu */
            position: absolute;
            background-color: rgb(56, 104, 175);
            padding: 10px 0;
            border-radius: 8px;
            z-index: 10;
        }

        .btn-secondary:hover .submenu {
            display: block; /* Tampilkan submenu saat hover */
        }

        .submenu li {
            list-style: none;
            margin: 0;
        }

        .submenu li a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            display: block;
        }

        .submenu li a:hover {
            background-color: rgb(82, 207, 153);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <h5>Wisata</h5>
                    <p>Jelajahi keindahan pantai dan tempat wisata lainnya.</p>
                    <a href="/tentang" class="btn btn-primary mt-2">Selengkapnya</a>
                    <img src="c:\Users\acer\Pictures\logo 1.ai" class="card-img-top">
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <h5>Galeri</h5>
                    <p>Koleksi foto dan video dari destinasi wisata.</p>
                    <a href="/page-gallery" class="btn btn-primary mt-2">Lihat Galeri</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <h5>Berita</h5>
                    <p>Berita terbaru seputar wisata dan kegiatan masyarakat.</p>
                    <a href="/halaman-berita" class="btn btn-primary mt-2">Berita Terbaru</a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <h5>Kuliner Wisata</h5>
                    <p>Nikmati kuliner khas di sekitar tempat wisata.</p>
                    <a href="/page-produk" class="btn btn-primary mt-2">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>  

</html>


<!-- popular_destination_area_start  
<div class="popular_destination_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Destinasi Populer</h3>
                    <p>
                        Berikut adalah destinasi wisata yang ada di Kabupaten Tanah Laut
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($gallery as $index => $foto): ?>
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="<?= base_url('uploads/' . $foto['nama_foto']) ?>" alt="">
                    </div>
                    <div class="content">
                      
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div> -->
<!-- popular_destination_area_end  -->

<!-- newletter_area_start  
<div class="newletter_area overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-5"> -->
                        <!-- <div class="newsletter_text">
                            <h4>Subscribe Our Newsletter</h4>
                            <p>Subscribe newsletter to get offers and about
                                new places to discover.</p>
                        </div> -->
                    </div>
                    <div class="col-lg-7">
                        <!-- <div class="mail_form">
                            <div class="row no-gutters">
                                <div class="col-lg-9 col-md-8">
                                    <div class="newsletter_field">
                                        <input type="email" placeholder="Your mail">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="newsletter_btn">
                                        <button class="boxed-btn4 " type="submit">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newletter_area_end  -->

<div class="travel_variation_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="assets-lp/img/svg_icon/1.svg" alt="">
                    </div>
                    <h3>Perjalanan Nyaman</h3>
                    <p>Ketenangan yang luar biasa telah merasuki seluruh jiwaku.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="assets-lp/img/svg_icon/2.svg" alt="">
                    </div>
                    <h3>Hotel Mewah</h3>
                    <p>Ketenangan yang luar biasa telah merasuki seluruh jiwaku.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="assets-lp/img/svg_icon/3.svg" alt="">
                    </div>
                    <h3>Panduan Perjalanan</h3>
                    <p>Ketenangan yang luar biasa telah merasuki seluruh jiwaku.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div class="video_area video_bg overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video_wrap text-center">
                    <h3>
                        Video Wisata Tanah Laut
                    </h3>
                    <div class="video_icon">
                        <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=f59dDEk57i0">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Video</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($video as $row) : ?>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                        <div class="thumb">
                        <iframe width="360" height="300" src="<?= $row['link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="info">
                            <div class="date">
                                <span><?= date('d F Y', strtotime($row['created_at'])); ?></span>
                            </div>
                            <a href="#">
                                <h3><?= $row['judul_video']; ?></h3>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- testimonial_area  -->
<!-- <div class="testimonial_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                        programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Micky Mouse</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                        programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Tom Mouse</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                    </div>
                                    <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                        programmes to help alleviate human suffering.</p>
                                    <div class="testmonial_author">
                                        <h3>- Jerry Mouse</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- /testimonial_area  -->

<?= $this->endSection(); ?>