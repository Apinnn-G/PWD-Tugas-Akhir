<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Hitung jumlah user
$user_count = $conn->query("SELECT COUNT(*) as total FROM user")->fetch_assoc()['total'];

// Hitung jumlah film
$film_count = $conn->query("SELECT COUNT(*) as total FROM film")->fetch_assoc()['total'];

// Film dengan rating tertinggi
$top_films = $conn->query("SELECT judul, rating FROM film ORDER BY rating DESC LIMIT 5")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - NONTONIQ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .dashboard-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
        
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .dashboard-title {
            color: #fff;
            font-size: 1.5rem;
        }
        
        .logout-btn {
            padding: 8px 15px;
            background: #ff2c1f;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: #fff;
        }
        
        .stat-card h3 {
            margin-bottom: 10px;
            font-size: 1rem;
        }
        
        .stat-card p {
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
            color: #ff2c1f;
        }
        
        .top-films {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        
        .top-films h3 {
            color: #fff;
            margin-bottom: 1rem;
        }
        
        .film-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .film-item {
            background: rgba(0, 0, 0, 0.3);
            padding: 10px;
            border-radius: 5px;
        }
        
        .film-item h4 {
            color: #fff;
            margin: 0 0 5px 0;
        }
        
        .film-item p {
            color: #ff2c1f;
            margin: 0;
        }
        
        .admin-nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 2rem;
        }
        
        .admin-nav a {
            padding: 10px 20px;
            background: #ff2c1f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .admin-nav a:hover {
            background: #e60000;
        }
    </style>
</head>
<body>
    <header>
        <a href="admin_dashboard.php" class="logo">
            <i class='bx bx-movie'></i> NONTONIQ - Admin
        </a>
        <div class="bx bx-menu" id="menu-icon"></div>
    </header>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Dashboard Admin</h1>
            <form action="admin_logout.php" method="post">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
        
        <div class="admin-nav">
            <a href="manage_films.php">Kelola Film</a>
            <a href="manage_users.php">Kelola User</a>
        </div>
        
        <div class="stats-container">
            <div class="stat-card">
                <h3>Total User</h3>
                <p><?php echo $user_count; ?></p>
            </div>
            <div class="stat-card">
                <h3>Total Film</h3>
                <p><?php echo $film_count; ?></p>
            </div>
            <div class="stat-card">
                <h3>Admin</h3>
                <p><?php echo $_SESSION['admin']['username']; ?></p>
            </div>
        </div>
        
        <div class="top-films">
            <h3>Film dengan Rating Tertinggi</h3>
            <div class="film-list">
                <?php foreach ($top_films as $film): ?>
                    <div class="film-item">
                        <h4><?php echo $film['judul']; ?></h4>
                        <p>Rating: <?php echo $film['rating']; ?>/5</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>