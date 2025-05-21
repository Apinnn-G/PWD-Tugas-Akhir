<?php
session_start();

// Koneksi ke database
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "film";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $repassword = $_POST['repassword'] ?? '';

    // Validasi input
    if (empty($username) || empty($email) || empty($password) || empty($repassword)) {
        echo "<script>alert('Semua field harus diisi!'); window.location.href='buatakun.php';</script>";
        exit();
    }

    if ($password !== $repassword) {
        echo "<script>alert('Password tidak cocok!'); window.location.href='buatakun.php';</script>";
        exit();
    }

    // Enkripsi password (opsional, tapi sangat disarankan)
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if ($stmt->execute()) {
        echo "<script>alert('Akun berhasil dibuat! Silakan login.'); window.location.href='signin.php';</script>";
    } else {
        echo "<script>alert('Gagal membuat akun: " . $stmt->error . "'); window.location.href='buatakun.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Akun - NONTONIQ</title>
    <link rel="stylesheet" href="buatakun.css">
</head>
<body>
    <div class="login-container">
        <h2>Buat Akun Baru</h2>
        <form method="POST" action="buatakun.php">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Masukkan email" required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <label for="repassword">Ulangi Password</label>
            <input type="password" name="repassword" placeholder="Ulangi password" required>

            <button type="submit">Simpan</button>
        </form>

        <div class="bottom-link">
            <p>Sudah punya akun? <a href="signin.php">Login di sini</a></p>
        </div>
    </div>
</body>
</html>
