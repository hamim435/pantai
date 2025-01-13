<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Wisata Pantai</title>
    <!-- Link CSS Bootstrap dan FontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .login-box {
            width: 360px;
            margin: 7% auto;
        }
        .login-logo a {
            font-size: 2rem;
            text-align: center;
        }
        .login-card-body {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="hold-transition login-page" style="background-image: url('d:\magang v1\foto\pantai.jpg'); background-size: cover; background-repeat: no-repeat;">">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Login</b> Wisata</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <!-- Tampilkan pesan error jika ada -->
                <?php if (session()->has('error')): ?>
                    <p style="color: red;"><?php echo session('error'); ?></p>
                <?php endif; ?>

                <!-- Form login -->
                <form action="/auth/processLogin" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    // Proses login
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil inputan
        $user_id = $_POST('id');
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validasi inputan kosong
        if (empty($username) || empty($password)) {
            session()->setFlashdata('error', 'Username dan password tidak boleh kosong.');
            header('Location: /login'); // Redirect ke halaman login
            exit();
        }

        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', 'wisatadigital');

        // Cek koneksi
        if ($conn->connect_error) {
            die('Koneksi gagal: ' . $conn->connect_error);
        }

        // Query untuk validasi username
        $stmt = $conn->prepare("SELECT * FROM tb_user WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Simpan informasi login ke session
                session()->set('user', $user);

                // Redirect ke halaman dashboard
                header('Location: /dashboard');
                exit();
            } else {
                session()->setFlashdata('error', 'Password salah.');
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan.');
        }

        // Tutup koneksi
        $stmt->close();
        $conn->close();

        // Redirect ke halaman login
        header('Location: /login');
        exit();
    }
    ?>
</>

    </div>

    <!-- Link JS Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
