<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "film"; 
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil keyword dari URL
$keyword = $_GET['keyword'] ?? '';
$keyword = $conn->real_escape_string($keyword);

// Query cari film berdasarkan judul
$sql = "SELECT * FROM film WHERE judul LIKE '%$keyword%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian - NONTONIQ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.html" class="logo"><i class='bx bx-movie'></i> NONTONIQ</a>
    </header>

    <section class="movies" id="search-results">
        <h2 class="heading">Hasil Pencarian: "<?php echo htmlspecialchars($keyword); ?>"</h2>
        <div class="movies-container">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="box">
                        <div class="box-img">
                            <img src="img/<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>">
                        </div>
                        <h3><?php echo $row['judul']; ?></h3>
                        <span><?php echo $row['durasi']; ?> | <?php echo $row['genre']; ?></span>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Tidak ditemukan film yang cocok.</p>
            <?php endif; ?>
        </div>
    </section>

    <div class="copyright">
        <p>&#169; NONTONIQ All Right Reserved</p>
    </div>
</body>
</html>

