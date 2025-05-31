<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Hapus user
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM user WHERE id = $id");
    header("Location: manage_users.php");
    exit();
}

// Ambil semua user
$users = $conn->query("SELECT * FROM user ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User - NONTONIQ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .manage-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
        
        .users-list h2 {
            color: #fff;
            margin-bottom: 1.5rem;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        
        th {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .action-btn {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .edit-btn {
            background: #4CAF50;
            color: white;
            text-decoration: none;
        }
        
        .delete-btn {
            background: #f44336;
            color: white;
            text-decoration: none;
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

    <div class="manage-container">
        <div class="users-list">
            <h2>Daftar User</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo date('d M Y', strtotime($user['created_at'])); ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="action-btn edit-btn">Edit</a>
                                <a href="manage_users.php?delete=<?php echo $user['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>