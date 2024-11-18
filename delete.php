<?php
include 'koneksi.php'; // Memasukkan koneksi database

$id = $_GET['id']; // Mendapatkan ID yang akan dihapus
$query = "DELETE FROM ekskul WHERE id_ekskul='$id'"; // Query untuk menghapus data
$hasil = mysqli_query($db, $query); // Eksekusi query

if ($hasil == true) {
    // Setelah data berhasil dihapus, SweetAlert2 akan ditampilkan
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Deleted!',
                text: 'Data has been deleted successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = 'viewsiswa.php'; // Arahkan ke halaman hasil setelah konfirmasi
                }
            });
        });
    </script>";
} else {
    // Jika penghapusan gagal, langsung redirect tanpa SweetAlert
    header('location:viewsiswa.php');
}
?>
