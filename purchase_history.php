<?php
session_start();
require 'database.php'; // Pastikan database.php terhubung dengan benar

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian - Dunia Laptop</title>
</head>
<body>
    <h2>Riwayat Pembelian</h2>
    <ul>
        <?php
        $orders = $conn->query("SELECT * FROM orders WHERE user_id = '$userId'");
        while ($order = $orders->fetch_assoc()) {
            echo "<li>Pesanan #" . $order['id'] . " - Total: Rp" . number_format($order['total_price'], 2) . " - Status: " . $order['status'] . "</li>";
        }
        ?>
    </ul>
</body>
</html>
