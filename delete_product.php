<?php
include 'database.php'; // Include file konfigurasi untuk koneksi database

// Cek apakah ID produk telah diberikan sebagai bagian dari URL
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $productId = $_GET['id'];

    // Query untuk menghapus produk dari database
    $query = "DELETE FROM products WHERE id = $productId";

    if($conn->query($query)){
        echo "Produk berhasil dihapus.";
        // Setelah berhasil menghapus, redirect ke halaman manajemen produk
        header("Location: products.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    die('ID Produk tidak valid.');
}
?>
