<?php
session_start(); // Memulai sesi
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

header("Location: login.php"); // Arahkan pengguna kembali ke halaman login
exit();
?>
