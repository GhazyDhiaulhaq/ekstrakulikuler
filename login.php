<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMA Islam Athirah</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="login-container">
<a href="dashboard.php" class="back-button">Back</a>
<?php
 
session_start();
 
include 'koneksi.php';
 
if (isset($_POST['tes'])) {
 
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // Menggunakan mysqli_real_escape_string untuk menghindari SQL injection
    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);
 
    // Query untuk memeriksa username dan password
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $hasil = mysqli_query($db, $query);
    $data_user = mysqli_fetch_assoc($hasil);
 
 
 
 
    if ($username == $data_user['username']) {
 
        $_SESSION['user'] = $data_user;
 
            $_SESSION['id_user'] = $data_user['id_user'];
            $_SESSION['username'] = $data_user['username'];
 
                $ss=$_SESSION['username'];
 
           
        }
    

        // Menampilkan SweetAlert2 dengan pesan sukses dan redirect ke inputsiswa.php
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
            Swal.fire({
                title: 'Welcome!',
                text: 'Selamat Datang Di Website Karya Muh Ghazy Dhiaulhaq, $ss',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'inputsiswa.php';
                }
            });
        </script>";
                
      }?> 
<!-- batas sintaks login-->


<style>
        .back-button {
    background-color: orange; /* Background color for the button */
    color: black; /* Text color */
    border: none; /* No border */
    padding: 10px 20px; /* Padding for the button */
    text-decoration: none; /* No underline */
    font-size: 16px; /* Font size */
    position: absolute; /* Positioning the button */
    top: 10px; /* Distance from the top */
    left: 10px; /* Distance from the left */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Cursor changes to pointer on hover */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Adding shadow */
}

.back-button:hover {
    background-color: #ffcc00; /* Darker yellow on hover */
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.5); /* Darker shadow on hover */
}
    </style>
    <div class="login-box">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="tes" class="btn-login">Login</button>
        </form>
        <p class="signup-link">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</div>

</body>
</html>