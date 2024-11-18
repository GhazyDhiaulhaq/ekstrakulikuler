<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Mahasiswa</title>
    <!-- Sertakan file CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Gaya Umum untuk Body */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        /* Container */
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            animation: slide-up 0.7s ease-out;
        }

        /* Animasi slide-up */
        @keyframes slide-up {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Header */
        h2 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Label */
        label {
            font-weight: bold;
            color: #555;
        }

        /* Input Form */
        .form-control {
            border: 2px solid #eee;
            padding: 1px 15px;
            font-size: 16px;
            border-radius: 8px;
            background-color: #f7f7f7;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        /* Input Animasi saat focus */
        .form-control:focus {
            border-color: #00f2fe;
            background-color: #fff;
            box-shadow: 0 0 8px rgba(0, 242, 254, 0.25);
        }

        /* Style untuk input */
        input[type="text"],
        input[type="date"] {
            width: 100%;
            margin-bottom: 20px;
        }

        /* Tombol Simpan */
        .btn-primary {
            background: linear-gradient(to right, #74ebd5, #04ef10);
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Hover untuk tombol simpan */
        .btn-primary:hover {
            background: linear-gradient(to right, #74ebd5, #04ef10);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        /* Tombol Lihat Hasil */
        .btn-success {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            color: #fff;
            font-weight: 800;
            text-transform: uppercase;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Hover untuk tombol lihat hasil */
        .btn-success:hover {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        /* Menambahkan ruang antar elemen */
        .form-group {
            margin-bottom: 20px;
        }

        /* Responsif untuk perangkat kecil */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 20px;
            }
        }
    </style>
</head>
<body>

<?php 
$no = 0; 
include 'koneksi.php';

// Cek apakah 'id' ada di parameter URL
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Query untuk mendapatkan data berdasarkan 'id_user'
    $query = "SELECT * FROM ekskul WHERE id_ekskul='$id'";
    $hasil = mysqli_query($db, $query);
    
    // Cek apakah query mengembalikan hasil dan data ditemukan
    if ($hasil && mysqli_num_rows($hasil) > 0) {
        $row = mysqli_fetch_assoc($hasil);
        $no++;
    } else {
        echo "<p>Data tidak ditemukan.</p>";
        exit;
    }
} else {
    echo "<p>ID tidak ditemukan di URL.</p>";
    exit;
}
?>

    <div class="container">
        <h2 class="mt-5">Form Input Data Mahasiswa</h2>
        <form action="" method="post">

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama'] ?>" required>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" class="form-control" name="kelas" id="kelas" value="<?php echo $row['kelas'] ?>" required>
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

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="viewsiswa.php" class="btn btn-success">Lihat Hasil</a>
        </form>
    </div>

    <!-- Sertakan file JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
if (isset($_POST['update'])) {
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $nis = $_POST["ekskl"];

    // Query untuk memperbarui data di tabel siswa
    $query = "UPDATE siswa SET Nama='$nama', Kelas='$kelas', NIS='$nis', TTL='$ttl', Alamat='$alamat', Hobi='$hobi', Cita_Cita='$cita' WHERE id_user=$id";
    $hasil = mysqli_query($db, $query);

    // Cek apakah update berhasil
    if ($hasil) {
        echo "<script>alert('Telah Berhasil Edit Data');window.location='inputsiswa.php'</script>";
    } else {
        echo "<script>alert('Gagal Edit Data');</script>";
        header('location:viewsiswa.php');
    }
}
?>
