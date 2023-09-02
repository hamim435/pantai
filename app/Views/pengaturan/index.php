<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Desa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            <?= $title; ?>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (session('success')): ?>
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <?= session('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session('error')): ?>
                                <div class="alert alert-danger alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <?= session('error'); ?>
                                </div>
                            <?php endif; ?>
                            <!-- form start -->
                            <form action="settings/update" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <!-- Input fields for editing -->
                                    <div class="form-group">
                                        <label for="nama_wisata">Nama Wisata</label>
                                        <input type="text"
                                            class="form-control <?= (session('errors.nama_wisata')) ? 'is-invalid' : ''; ?>"
                                            id="nama_wisata" name="nama_wisata"
                                            value="<?= $pengaturan['nama_wisata']; ?>">
                                        <?php if (session('errors.nama_wisata')): ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.nama_wisata'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="profil_wisata">Profil Wisata</label>
                                        <textarea
                                            class="form-control <?= (session('errors.profil_wisata')) ? 'is-invalid' : ''; ?>"
                                            id="profil_wisata"
                                            name="profil_wisata"><?= $pengaturan['profil_wisata']; ?></textarea>
                                        <?php if (session('errors.profil_wisata')): ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.profil_wisata'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="titik_koordinator">Titik Koordinat</label>

                                        <link rel="stylesheet"
                                            href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
                                        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

                                        <div id="map" style="height: 400px;"></div>
                                        <div id="coordinates"></div>
                                        <script>
                                            var map = L.map('map').setView([-6.2088, 106.8456], 13);

                                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                attribution: '© OpenStreetMap contributors'
                                            }).addTo(map);

                                            var marker = L.marker([-6.2088, 106.8456], { draggable: true }).addTo(map);

                                            marker.on('dragend', function (event) {
                                                var marker = event.target;
                                                var position = marker.getLatLng();
                                                document.getElementById('coordinates').innerHTML = 'Koordinat: ' + position.lat + ', ' + position.lng;
                                                document.getElementById('titik_koordinator').value = position.lat + ', ' + position.lng;
                                            });
                                        </script>
                                        <textarea
                                            class="form-control <?= (session('errors.titik_koordinator')) ? 'is-invalid' : ''; ?>"
                                            id="titik_koordinator"
                                            name="titik_koordinator"><?= $pengaturan['titik_koordinator']; ?></textarea>
                                        <?php if (session('errors.titik_koordinator')): ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.titik_koordinator'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="hari">Hari</label>
                                        <textarea
                                            class="form-control <?= (session('errors.hari')) ? 'is-invalid' : ''; ?>"
                                            id="hari" name="hari"><?= $pengaturan['hari']; ?></textarea>
                                        <?php if (session('errors.hari')): ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.hari'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu_bisnis">Waktu Bisnis</label>
                                        <textarea
                                            class="form-control <?= (session('errors.waktu_bisnis')) ? 'is-invalid' : ''; ?>"
                                            id="waktu_bisnis"
                                            name="waktu_bisnis"><?= $pengaturan['waktu_bisnis']; ?></textarea>
                                        <?php if (session('errors.waktu_bisnis')): ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.waktu_bisnis'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="logo_wisata">Logo Wisata</label>
                                        <input type="file"
                                            class="form-control-file <?= (session('errors.logo_wisata')) ? 'is-invalid' : ''; ?>"
                                            id="logo_wisata" name="logo_wisata">
                                        <?php if (session('errors.logo_wisata')): ?>
                                            <div class="invalid-feedback">
                                                <?= session('errors.logo_wisata'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($pengaturan['logo_wisata']): ?>
                                            <img src="<?= base_url('uploads/' . $pengaturan['logo_wisata']); ?>"
                                                alt="Logo wisata" class="mt-2" style="max-width: 200px;">
                                        <?php endif; ?>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="/" class="btn btn-secondary">Back</a>
                                    </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

<?= $this->endSection(); ?>