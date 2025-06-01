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
    <style>
    .no-results {
    text-align: center;
    color: rgba(255, 255, 255, 0.5);
    font-size: 1.2rem;
    grid-column: 1 / -1;
    padding: 50px 0;
    }
    </style>
</head>
<body>
    <header>
        <a href="index.html" class="logo"><i class='bx bx-movie'></i> NONTONIQ</a>
    </header>

    <section class="movies" id="search-results">
        <h2 class="heading">Hasil Pencarian: "<?php echo htmlspecialchars($keyword); ?>"</h2>
        <div class="search-results-container">
            <div class="search-results">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="search-item" onclick="window.location.href='film_detail.php?id=<?php echo $row['id']; ?>'">
                            <img src="img/<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>" class="search-poster">
                            <div class="search-info">
                                <h3 class="search-film-title"><?php echo $row['judul']; ?></h3>
                                <p class="search-film-meta"><?php echo $row['durasi']; ?> | <?php echo $row['genre']; ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="no-results">Tidak ditemukan film yang cocok.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <div class="copyright">
        <p>&#169; NONTONIQ All Right Reserved</p>
    </div>
    <script>
    document.querySelectorAll('.search-item').forEach(item => {
        item.addEventListener('click', function() {
            window.location.href = this.getAttribute('onclick').match(/href='(.*?)'/)[1];
        });
    });
    </script>
</body>
</html>

