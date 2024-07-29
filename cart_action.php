<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'database.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0 && $action === 'add') {
    // Query database untuk mendapatkan produk dengan id yang sesuai
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Memeriksa apakah produk sudah ada di dalam keranjang
        if (isset($_SESSION['cart'][$id])) {
            // Jika sudah ada, tingkatkan jumlahnya
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            // Jika belum ada, tambahkan produk ke keranjang dengan jumlah 1
            $_SESSION['cart'][$id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }
    }
}

// Mengarahkan kembali ke halaman cart.php setelah melakukan aksi
header('Location: keranjang.php');
exit();
?>
