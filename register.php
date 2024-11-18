<?php
// register.php

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'sekolah');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi jika password dan confirm password tidak sama
    if ($password !== $confirm_password) {
        $error_message = "Password dan konfirmasi password tidak sama!";
    } else {
        // Hash password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Masukkan data ke dalam database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $success_message = "Pendaftaran berhasil! Silakan login.";
        } else {
            $error_message = "Gagal mendaftar: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SMA Islam Athirah</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link ke file CSS -->
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h2>Daftar Akun</h2>
        <?php if ($error_message): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <?php if ($success_message): ?>
            <p class="success-message"><?php echo $success_message; ?></p>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn-login">Daftar</button>
        </form>
        <p class="signup-link">Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</div>

</body>
</html>
