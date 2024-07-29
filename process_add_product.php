<?php
include 'database.php'; // Include konfigurasi database

// Validasi dan sanitasi input
$name = $conn->real_escape_string($_POST['name']);
$description = $conn->real_escape_string($_POST['description']);
$price = floatval($_POST['price']);
$image = $_FILES['image']['name'];
$targetDir = "../dbguitar_world/assets/images/"; // Direktori tujuan
$target = $targetDir . basename($image);

// Membuat direktori jika belum ada
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true); // Perhatikan bahwa menggunakan 0777 bisa menjadi risiko keamanan
    // Sesuaikan izin direktori sesuai dengan kebijakan keamanan server Anda
}

// Query untuk menambah produk
$sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";

// Memeriksa apakah file berhasil di-upload
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    if ($conn->query($sql) === TRUE) {
        echo "Produk baru berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Gagal meng-upload gambar.";
}

$conn->close();
?>
