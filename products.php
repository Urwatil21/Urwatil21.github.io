<?php
session_start(); // Memulai sesi
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Mengarahkan ke login jika belum masuk
    exit();
}
include 'database.php'; // Meng-include konfigurasi database

// Menjalankan query untuk mendapatkan semua produk
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            overflow: hidden;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: rebeccapurple; /* Warna header diubah menjadi biru tua */
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1, .header h2 {
            margin: 0;
        
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid blueviolet; /* Warna border cell diubah menjadi biru tua */
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: blueviolet; /* Warna header kolom diubah menjadi biru tua */
            color: white;
        }
        tr:nth-child(even) {
            background-color: white;
        }
        a {
            text-decoration: none;
            color: #0275d8;
        }
        a:hover {
            color: blueviolet;
        }
        .add-btn, .checkout-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: navy;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .add-btn:hover, .checkout-btn:hover {
            background-color: #01447e;
        }
        .product-image {
            width: 100px;
            height: auto;
            display: block;
            margin: auto;
        }
        footer {
            background-color: rebeccapurple;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Produk Kami</h1>
        <h2>Jam Tangan</h2>
    </div>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Tambah ke Keranjang</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><img class="product-image" src="<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image"></td>
                            <td><?= htmlspecialchars($row["name"]); ?></td>
                            <td><?= htmlspecialchars($row["description"]); ?></td>
                            <td>Rp<?= number_format($row["price"], 2, ',', '.'); ?></td>
                            <td><a href='cart_action.php?action=add&id=<?= $row["id"]; ?>' class="add-btn">Tambah ke Keranjang</a></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan='5'>Belum ada produk yang ditambahkan.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="checkout.php" class="checkout-btn">Checkout</a>
    </div>
    <footer>
        <p>&copy; <?= date("Y"); ?> Jam Tangan. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
  