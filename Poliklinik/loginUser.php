<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = $mysqli->query($query);

    if (!$result) {
        die("Query error: " . $mysqli->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row['fullname'];
            header("Location: index.php");
        } else {
            $error = "Password salah";
        }
    } else {
        $error = "User tidak ditemukan";
    }
}
?>

<div class="container" style="margin-top: 10rem;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-custom">
                <div class="card-body">
                    <div class="row d-flex justify-content-center align-items-center px-5 py-4">
                        <div class="col lg-6">
                            <img src="images/login.png" class="img-fluid" alt="login-pic">
                        </div>
                        <div class="col-lg-6">
                            <h1 class="text-center">Login</h1>
                            <form method="POST" action="index.php?page=loginUser">
                                <?php
                                if (isset($error)) {
                                    echo '<div class="alert alert-danger">' . $error . '
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';
                                }
                                ?>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" required placeholder="Masukkan username anda">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required placeholder="Masukkan password anda">
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-outline-primary px-4 btn-block">Login</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-3">Belum punya akun? <a style="text-decoration: none; color: #1fbfb8;" href="index.php?page=registerUser">Register</a></p>
                                <p class="mt-3">Login sebagai dokter? <a style="text-decoration: none; color: #1fbfb8;" href="index.php?page=loginDokter">Ya, Saya Dokter</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .border-custom {
        border: 2px solid #1fbfb8; /* Warna garis tepi */
        border-radius: 8px;       /* Radius untuk membuat sudut melengkung */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan lembut untuk estetika */
    }

    .border-custom .card-header {
        background-color: #1fbfb8; /* Warna header */
        color: #fff;              /* Warna teks header */
    }

    .btn-outline-primary {
        border-color: #1fbfb8;   /* Warna garis tombol */
        color: #1fbfb8;          /* Warna teks tombol */
    }

    .btn-outline-primary:hover {
        background-color: #1fbfb8; /* Warna tombol saat di-hover */
        color: #fff;              /* Warna teks tombol saat di-hover */
    }

    a {
        color: #1fbfb8; /* Warna tautan */
    }

    a:hover {
        text-decoration: underline; /* Memberikan garis bawah pada tautan saat di-hover */
    }
</style>
