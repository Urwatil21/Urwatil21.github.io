<?php
include 'database.php'; // Include file konfigurasi untuk koneksi database

// Pastikan ID produk ada dan valid
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $productId = intval($_GET['id']);

    // Ambil data produk dari database
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $product = $result->fetch_assoc();
    } else {
        die('Produk tidak ditemukan.');
    }

    $stmt->close();
} else {
    die('ID Produk tidak valid.');
}

// Proses submit formulir
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $image = trim($_POST['image']);

    // Validasi input
    if (empty($name) || empty($description) || empty($price) || empty($image)) {
        echo "Semua kolom harus diisi.";
    } elseif (!is_numeric($price)) {
        echo "Harga harus berupa angka.";
    } else {
        // Update data produk
        $updateQuery = "UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssdsi", $name, $description, $price, $image, $productId);

        if($stmt->execute()){
            echo "<script>alert('Produk berhasil diperbarui.'); window.location.href='products.php';</script>";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: grey;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            margin-top: 10px;
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <h2>Edit Produk</h2>
    <form action="" method="post">
        <label for="name">Nama Produk:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>

        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>

        <label for="price">Harga:</label>
        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>

        <label for="image">Gambar Produk:</label>
        <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($product['image']); ?>" required>
        
        <input type="submit" value="Update Produk">
    </form>
</body>
</html>
