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

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';

    // Hindari SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Pilih tabel berdasarkan role
    if ($role === "admin") {
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    } else if ($role === "user") {
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    } else {
        echo "<script>alert('Peran tidak valid.'); window.location.href = 'signin.php';</script>";
        exit();
    }

    // Eksekusi query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Login sukses
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        if ($role === "admin") {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
        exit();
    } else {
        // Login gagal
        echo "<script>alert('Username atau password salah!'); window.location.href = 'signin.php';</script>";
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - NONTONIQ</title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>

    <div class="login-container">
        <h2>Selamat Datang di NONTONIQ</h2>

        <form action="signin.php" method="POST">
            <label for="role">Login Sebagai:</label>
            <select name="role" required>
                <option value="">Pilih peran</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Email atau username" required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Masukkan PIN atau password" required>

            <button type="submit" formaction="index.html">Login</button>
        </form>

        <div class="bottom-link">
            <p>Belum punya akun? <a href="buatakun.php">Daftar sekarang</a></p>
        </div>
    </div>

</body>
</html>
