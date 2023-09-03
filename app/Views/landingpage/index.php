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

<!-- popular_destination_area_start  -->
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
</div>
<!-- popular_destination_area_end  -->

<!-- newletter_area_start  -->
<div class="newletter_area overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="newsletter_text">
                            <h4>Subscribe Our Newsletter</h4>
                            <p>Subscribe newsletter to get offers and about
                                new places to discover.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mail_form">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newletter_area_end  -->
<!-- 
<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Popular Places</h3>
                    <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit
                        hella wolf moon beard words.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/1.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>California</h3>
                        </a>
                        <p>United State of America</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <a href="#">(20 Review)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/2.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>Korola Megna</h3>
                        </a>
                        <p>United State of America</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <a href="#">(20 Review)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/3.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>London</h3>
                        </a>
                        <p>United State of America</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <a href="#">(20 Review)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/4.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>Miami Beach</h3>
                        </a>
                        <p>United State of America</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <a href="#">(20 Review)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/5.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>California</h3>
                        </a>
                        <p>United State of America</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <a href="#">(20 Review)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="img/place/6.png" alt="">
                        <a href="#" class="prise">$500</a>
                    </div>
                    <div class="place_info">
                        <a href="destination_details.html">
                            <h3>Saintmartine Iceland</h3>
                        </a>
                        <p>United State of America</p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <a href="#">(20 Review)</a>
                            </span>
                            <div class="days">
                                <i class="fa fa-clock-o"></i>
                                <a href="#">5 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="more_place_btn text-center">
                    <a class="boxed-btn4" href="#">More Places</a>
                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="video_area video_bg overlay">
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
<div class="testimonial_area">
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
</div>
<!-- /testimonial_area  -->





<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Berita Terbaru</h3>
                </div>
            </div>
        </div>
        <div class="row">
        <?php foreach ($berita as $index => $item): ?>
            <div class="col-lg-4 col-md-6">
                <div class="single_trip">
                    <div class="thumb">
                        <img src="<?= base_url('uploads/' . $item['foto']); ?> " alt="">
                    </div>
                    <div class="info">
                        <div class="date">
                            <span>
                                <?= $item['updated_at']; ?>
                            </span>
                        </div>
                        <a href="<?= base_url('halaman-berita/' . $item['slug']); ?>">
                            <h3>
                                <?= $item['judul_berita']; ?>
                            </h3>
                        </a>
                        <!-- baca seterus nya -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="date">
                                    <span>
                                        <?= $item['kategori_berita']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>    
        </div>
    </div>
</div>

<?= $this->endSection(); ?>