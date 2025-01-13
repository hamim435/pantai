<?= $this->extend('templates_lp/main'); ?>

<?= $this->section('content'); ?>

<!-- bradcam_area -->
<div class="bradcam_area bradcam_bg_4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Produk Jualan</h3>
                    <p>
                        <a href="/">Beranda</a> / Produk
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area -->

<style>
    body {
        background-color: #f8f9fa;
    }
    .menu-container {
        position: relative;
        display: inline-block;
    }
    .menu-btn {
        background-color: rgb(43, 118, 198);
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
    }
    .menu-btn:hover {
        background-color: #0056b3;
    }
    .submenu {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        z-index: 1;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }
    .submenu a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        border-bottom: 1px solid #ddd;
    }
    .submenu a:last-child {
        border-bottom: none;
    }
    .submenu a:hover {
        background-color: #ddd;
    }
</style>

<div class="container mt-4">
    <!-- Menu Produk -->
    <div class="menu-container">
        <a href="<?= base_url('economy') ?>" class="btn btn-primary mt-2">Menu Produk</a>
    </div>
</div>

<?= $this->endSection(); ?>
