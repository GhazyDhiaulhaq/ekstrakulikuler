<!DOCTYPE html>
<html>
<head>
    <title>Tabel Data Mahasiswa</title>
    <!-- Sertakan file CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="viewsiswa.css">

</head>
<body>
    <div class="container">
        <h2 class="mt-5">Tabel Data Ekstrakulikuler</h2>
        <a href="inputsiswa.php" class="btn btn-primary">Tambah Data</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Ekskul</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
            <?php 
                $no = 0; 
                $koneksi = new mysqli ("localhost","root","","sekolah");
                $query = "SELECT * FROM ekskul";
                $hasil = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($hasil)) {
                    $no++;
            ?>
                <tr>
                    <td><?php echo $no?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['kelas'];?></td>
                    <td><?php echo $row['ekskl'];?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id_ekskul']?>" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger delete-btn" data-id="<?php echo $row['id_ekskul']?>">Delete</button>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>

    <!-- Sertakan file JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Event listener untuk tombol "Delete"
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.getAttribute('data-id'); // Ambil ID siswa

                // Tampilkan SweetAlert2 untuk konfirmasi penghapusan
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika dikonfirmasi, redirect ke delete.php untuk menghapus data
                        window.location.href = `delete.php?id=${id}`;
                    }
                });
            });
        });
    </script>

</body>
</html>
