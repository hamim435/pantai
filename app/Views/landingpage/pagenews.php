<?= $this->extend('templates_lp/main'); ?>

<?= $this->section('content'); ?>


 <!-- bradcam_area  -->
 <div class="bradcam_area bradcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>blog</h3>
                        <p>Pixel perfect design with awesome contents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php foreach ($berita as $b) :
                        // Konversi updated_at menjadi objek DateTime
                        $updatedDate = new DateTime($b['updated_at']);

                        // Mendapatkan tanggal dalam format 'd'
                        $tanggal = $updatedDate->format('d');

                        // Mendapatkan bulan dalam format 'M'
                        $bulan = $updatedDate->format('M');

                        // Batasan jumlah karakter yang ingin ditampilkan untuk isi berita
                        $maxKarakter = 200;
                        $isiBerita = $b['isi'];
                        if (strlen($isiBerita) > $maxKarakter) {
                            $isiBerita = substr($isiBerita, 0, $maxKarakter) . '...';
                        }
                    ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?= base_url('uploads/' . $b['foto']); ?>" alt="">
                                <a href="<?= base_url('halaman-berita/' . $b['slug']); ?>" class="blog_item_date">
                                    <h3><?= $tanggal; ?></h3>
                                    <p><?= $bulan; ?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?= base_url('halaman-berita/' . $b['slug']); ?>">
                                    <h2><?= $b['judul_berita']; ?></h2>
                                </a>
                                <p><?= $isiBerita; ?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i><?= $b['kategori_berita']; ?></a></li>
                                </ul>
                            </div>
                        </article>
                    <?php endforeach; ?>
                    
                    <!-- <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav> -->

                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <!-- Sidebar lainnya -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<?= $this->endSection(); ?>
