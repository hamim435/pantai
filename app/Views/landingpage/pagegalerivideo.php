<?= $this->extend('templates_lp/main'); ?>

<?= $this->section('content'); ?>
<div class="recent_trip_area py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <p>Wisata Digital</p>
                    <h3>Galeri Video</h3>
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

<?= $this->endSection(); ?>