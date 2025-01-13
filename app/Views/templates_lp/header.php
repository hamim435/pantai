    <!-- Tambahkan di dalam tag <head> -->
<style>
    /* Reset dasar */
    body, ul, li, a {
        margin: 0;
        padding: 0;
        list-style: none;
        text-decoration: none;
        font-family: Arial, sans-serif;
    }

    /* Header area */
    .header-area {
        background:rgb(62, 157, 10);
        border-bottom: 1px solid #ddd;
    }

    .header_bottom_border {
        padding: 10px 0;
    }

    /* Logo styling */
    .logo img {
        max-width: 120px;
    }

    /* Navigation menu */
    .main-menu {
        text-align: center;
    }

    #navigation {
        display: flex;
        justify-content: space-between;
    }

    #navigation li {
        position: relative;
        margin: 0 15px;
    }

    #navigation li a {
        color: #333;
        font-weight: 600;
        padding: 8px 15px;
        transition: color 0.3s ease;
    }

    #navigation li:hover > .submenu {
        display: block;
    }

    /* Social links */
    .social_wrap {
        display: flex;
        gap: 15px;
    }

    .social_links ul {
        display: flex;
        gap: 10px;
    }

    .social_links ul li a {
        color: #555;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    .social_links ul li a:hover {
        color: #007bff;
    }

    /* Mobile menu */
    .mobile_menu {
        display: none;
    }

    @media (max-width: 768px) {
        .main-menu {
            display: none;
        }

        .mobile_menu {
            display: block;
            background: #007bff;
            padding: 10px;
            text-align: center;
        }

        .mobile_menu a {
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }
    }
</style>

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="assets-lp/img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="/">Beranda</a></li>
                                            <li><a href="/tentang">Profil Wisata</a></li>
                                            <li><a href="/berita">Berita<i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="/halaman-berita">Berita Terbaru</a></li>
                                                    <!-- <li><a href="single-blog.html">single-blog</a></li> -->
                                                </ul>
                                            </li>
                                            <li><a href="#">Galeri<i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="/page-gallery">Galeri Foto</a></li>
                                                    <li><a href="/halaman-galeri-video">Galeri Video</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="/halaman-kontak">Kontak</a></li>
                                            <li><a href="/page-produk">Produk</a></li>
                                            <li><a href="/login">Login</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <!-- <div class="number">
                                        <p> <i class="fa fa-phone"></i> 10(256)-928 256</p>
                                    </div> -->
                                    <div class="social_links d-none d-xl-block">
                                        <ul>
                                            <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="seach_icon">
                                <!-- <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                    <i class="fa fa-search"></i>
                                </a> -->
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->