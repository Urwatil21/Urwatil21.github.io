<?php
// Memulai sesi
session_start();

// Menghapus semua variabel sesi
session_unset();

// Menghancurkan sesi
session_destroy();

// Mengarahkan pengguna kembali ke halaman login atau beranda setelah logout
header('Location: indexdddd.php');
exit;
?>
