<?= $this->extend('templates_lp/main'); ?>

<?= $this->section('content'); ?>

<!-- bradcam_area -->

<!--/ bradcam_area -->
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <form action="/page-produk" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari produk (misal: makanan)" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

<div class="container mt-4">
    <!-- Menu Produk -->
    <div class="menu-container">
            <div class="row g-4 mt-4">
        <?php if (!empty($produk)) : ?>
            <?php foreach ($produk as $item): ?>
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 shadow">
                        <img src="/uploads/<?= $item['foto']; ?>" class="card-img-top" alt="<?= $item['nama_produk']; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $item['nama_produk']; ?></h5>
                            <p class="card-text"><?= $item['deskripsi']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-md-12">
                <p class="text-center">Produk tidak ditemukan.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
        </div>
    </div>

<script>
    function toggleMenu() {
        const submenu = document.getElementById('submenu');
        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    }
</script>

<?= $this->endSection(); ?>
