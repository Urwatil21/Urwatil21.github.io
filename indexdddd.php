<?php
session_start();
include 'database.php'; // Memasukkan file konfigurasi
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Jam Tangan</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path jika diperlukan -->
</head>
   <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
            color: #333;
        }
        main {
            padding: 20px;
        }
        #featured-products {
            border: 2px solid pink;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        header {
            background-color:  rebeccapurple;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .products {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .card {
            width: 30%;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .card img {
            width: 100%;
            height: auto;
            display: block;
            border-bottom: 1px solid #ccc;
        }
        .card-body {
            padding: 10px;
            text-align: center;
        }
        .card-title {
            margin-bottom: 10px;
        }
        .card-text {
            margin-bottom: 10px;
        }
        .btn {
            background-color: blueviolet;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .footer {
            background-color: #003399;
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
</style>
    
</head>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama - Jam Tangan</title>
    <style>
        /* CSS lainnya di sini */
        .nav-bar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: #0066ff;
            color: white;
            padding: 10px;
        }
        .logout-btn,
        .cart-icon {
            margin-left: 10px;
            cursor: pointer;
        }
        .cart-icon svg {
            width: 24px;
            height: 24px;
            fill: white;
        }
        .cart-icon:hover {
            background-color: #0066ff;
        }
    </style>
<body>
    <header>
        <h1>Selamat Datang di Toko Jam Tangan</h1>
        <nav>
            <ul>
                <li><a href="indexdddd.php">Home</a></li>
                <li><a href="products.php">Produk</a></li>
                <li><a href="about.php">Tentang Kami</a></li>
                <li><a href="contact.php">Kontak</a></li>
                <li><a href="register.php">Registrasi</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="featured-products">
            <h2>Produk Unggulan</h2>
            <div class="products">
                <div class="card">
                    <img src="jam8.jpg" alt="jam8" width="200">
                    <div class="card-body">
                        <h4 class="card-title">Jam Geneva</h4>
                        <p class="card-text">Jam ini cocok untuk semua jenis warna kulit .</p>
                        <a href="products.php" class="btn">Detail Selengkapnya</a>
                    </div>
                </div>
                <div class="card">
                <img src="jam2.jpg" alt="jam2" width="200">
                    <div class="card-body">
                        <h4 class="card-title">Jam Inschic</h4>
                        <p class="card-text">Jam Tangan Wanita Bernuansa Pink Megah.</p>
                        <a href="products.php" class="btn">Detail Selengkapnya</a>
                    </div>
                </div>
                <div class="card">
                    <img src="jam3.jpg" alt="jam3" width="200">
                    <div class="card-body">
                        <h4 class="card-title">Jam Bergenz</h4>
                        <p class="card-text">Jam Tangan Couple Pria Dan Wanita.</p>
                        <a href="products.php" class="btn">Detail Selengkapnya</a>
                    </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Jam Tangan. Semua hak dilindungi.</p>
    </footer>
</body>
</html>

