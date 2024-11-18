<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Mahasiswa</title>
    <!-- Sertakan file CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="inputsiswa.css">
    <style>
.form-control {
    border: 2px solid #eee;
    padding: 1px 15px;
    font-size: 16px;
    border-radius: 8px;
    background-color: #f7f7f7;
    font-weight: bold;
    transition: all 0.3s ease;
}

    </style>

</head>
<body>
    <div class="container">
        <h2 class="mt-5">Form Input Data Ektrakurikuler</h2>
        <div class="text-right">
    <a href="login.php" class="btn btn-danger" style="position: absolute; top: 10px; right: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);">
        Logout
    </a>
</div>

        <form action="" method="post">

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <select class="form-control" name="kelas">Kelas
                <option>---</option>
                <option>X.1</option>
                <option>X.2</option>
                <option>X.3</option>
                <option>X.4</option>
                <option>X.5</option>
                <option>X.6</option>
                <option>XI.1</option>
                <option>XI.2</option>
                <option>XI.3</option>
                <option>XI.4</option>
                <option>XI.5</option>
                <option>XI.6</option>
                <option>XII.1</option>
                <option>XII.2</option>
                <option>XII.3</option>
                <option>XII.4</option>
                <option>XII.5</option>
                <option>XII.6</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nis">Ekskul:</label><br>
                <input type="checkbox" name="ekskul[]" value="Bulutangkis"> Bulutangkis<br>
        <input type="checkbox" name="ekskul[]" value="Basket"> Basket<br>
        <input type="checkbox" name="ekskul[]" value="Futsal"> Futsal<br>
        <input type="checkbox" name="ekskul[]" value="Volleyball"> Volleyball<br>
        <input type="checkbox" name="ekskul[]" value="Band"> Band<br>
        <input type="checkbox" name="ekskul[]" value="Seni Tari"> Seni Tari<br>
        <input type="checkbox" name="ekskul[]" value="E-Sport"> E-Sport<br>
        <input type="checkbox" name="ekskul[]" value="Memanah"> Memanah<br>
        <input type="checkbox" name="ekskul[]" value="Karate"> Karate<br>            
        <input type="checkbox" name="ekskul[]" value="Taekwondo"> Taekwondo<br>
        <input type="checkbox" name="ekskul[]" value="Renang"> Renang<br>
        <input type="checkbox" name="ekskul[]" value="English Debate"> English Debate<br>
        <input type="checkbox" name="ekskul[]" value="KIR"> KIR<br>
        <input type="checkbox" name="ekskul[]" value="Coding"> Coding<br>
        <input type="checkbox" name="ekskul[]" value="Liberan"> Liberan<br>


    </div>
           
            <button type="submit" name="tombol" class="btn btn-primary">Simpan</button>
            <a href="viewsiswa.php" class="btn btn-success"> Lihat Hasil </a>
        </form>
    </div>

    <!-- Sertakan file JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- SweetAlert2 akan ditampilkan hanya jika form disubmit -->
    <?php if (isset($_POST['tombol'])): ?>
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "Data telah tersimpan",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result)) 
        </script>
    <?php endif; ?>
</body>
</html>

<?php
if (isset($_POST['tombol'])) {

    // Buat koneksi
    $koneksi = new mysqli("localhost", "root", "", "sekolah");

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Ambil data dari form
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    // Ambil data ekskul dalam bentuk array, lalu gabungkan dengan koma
    if (!empty($_POST['ekskul'])) {
        $ekskul = implode(', ', $_POST['ekskul']); // Gabungkan nilai checkbox menjadi string
    } else {
        $ekskul = ''; // Jika tidak ada yang dipilih
    }

    // Query untuk menyimpan data
    $sql_simpan = "INSERT INTO ekskul (nama, kelas, ekskl) VALUES ('$nama', '$kelas', '$ekskul')";

    if ($koneksi->query($sql_simpan) === TRUE) {
      
    } else {
        echo "Error: " . $sql_simpan . "<br>" . $koneksi->error;
    }

    // Tutup koneksi setelah data disimpan
    $koneksi->close();
}
?>

