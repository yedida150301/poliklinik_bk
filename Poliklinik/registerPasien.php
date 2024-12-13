<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-custom">
                <div class="card-header text-center" style="font-weight: bold; font-size: 32px;">Register</div>
                <div class="card-body">
                    <form method="POST" action="index.php?page=registerPasien">
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
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" required placeholder="Masukkan Nama anda">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required placeholder="Masukkan Alamat anda">
                        </div>
                        <div class="form-group">
                            <label for="no_ktp">Masukkan Nomor KTP/NIK</label>
                            <input type="no_ktp" name="no_ktp" class="form-control" required placeholder="Masukkan Nomor KTP/NIK">
                        </div>
                        <div class="form-group">
                            <label for="confirm_ktp">Konfirmasi KTP/NIK</label>
                            <input type="password" name="confirm_ktp" class="form-control" required placeholder="Masukkan Ulang KTP/NIK">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input type="text" name="no_hp" class="form-control" required placeholder="Masukkan Nomor HP Anda">
                        </div>
                        <div class="text-center mt-3">
                            <!-- Tombol Register dengan warna, border, dan bayangan -->
                            <button type="submit" class="btn" style="background-color: #1fbfb8; border: 2px solid #1fbfb8; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); color: white;">Register</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <p class="mt-3">Sudah Terdaftar? <a href="index.php?page=CekRM" style="text-decoration: none; color: #1fbfb8;">Cek Nomor Rekam Medis</a></p>
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
</style>