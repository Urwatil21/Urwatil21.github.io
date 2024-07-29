<?php
session_start();
require 'database.php'; // Pastikan database.php terhubung dengan benar

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("Pengguna tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Jam Tangan</title>
    <style>
        /* CSS untuk tema dominan warna #990000, hitam, dan putih */
        body {
            background-color: #fff;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: blueviolet;
            text-align: center;
            margin-top: 50px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #000;
        }
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #000;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: blueviolet;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: blueviolet;
        }
    </style>
</head>
<body>
    <h2>Profil Pengguna</h2>
    <form action="update_profile.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        
        <!-- Tambahkan field lain sesuai kebutuhan -->
        
        <input type="submit" value="Update Profil">
    </form>
</body>
</html>
