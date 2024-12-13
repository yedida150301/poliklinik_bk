<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = $mysqli->query($query);

        if ($result === false) {
            die("Query error: " . $mysqli->error);
        }

        if ($result->num_rows == 0) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $insert_query = "INSERT INTO user (username, password) VALUES ('$username', '$hashed_password')";
            if (mysqli_query($mysqli, $insert_query)) {
                echo "<script>
                alert('Pendaftaran Berhasil'); 
                document.location='index.php?page=loginUser';
                </script>";
            } else {
                $error = "Pendaftaran gagal";
            }
        } else {
            $error = "Username sudah digunakan";
        }
    } else {
        $error = "Password tidak cocok";
    }
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-custom">
                <div class="card-header text-center" style="font-weight: bold; font-size: 32px;">Register</div>
                <div class="card-body">
                    <form method="POST" action="index.php?page=registerUser">
                        <?php
                        if (isset($error)) {
                            echo '<div class="alert alert-danger">' . $error . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>';
                        }
                        ?>
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required placeholder="Masukkan nama anda">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required placeholder="Masukkan password konfirmasi">
                        </div>
                        <div class="text-center mt-3">
                            <!-- Tombol Register dengan styling -->
                            <button type="submit" class="btn" style="background-color: #1fbfb8; border: 2px solid #1fbfb8; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); color: white; width: 100%;">Register</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Sudah Punya Akun? <a href="index.php?page=loginUser" style="color: #1fbfb8;">Login</a></p>
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