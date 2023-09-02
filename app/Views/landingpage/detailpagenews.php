<?= $this->extend('templates_lp/main'); ?>

<?= $this->section('content'); ?>

 <!--================Blog Area =================-->
 <section class="blog_area single-post-area section-padding">
     <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="<?= base_url('uploads/' . $berita['foto']); ?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?= $berita['judul_berita']; ?></h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-calendar"> </i><?= $formatted_date; ?></a></li>
                     </ul>
                     <p class="excert"><?= $berita['isi']; ?></p>
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Kategori</h4>
                     <ul class="list cat-list">
                        <?php foreach ($categories as $category) : ?>
                            <li>
                                <a href="#" class="d-flex">
                                    <p><?= $category['kategori_berita']; ?></p>
                                    <!-- Jumlah berita dengan kategori yang sama bisa dihitung disini jika diperlukan -->
                                </a>
                            </li>
                        <?php endforeach; ?>
                     </ul>
                  </aside>
               
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

<?= $this->endSection(); ?>
