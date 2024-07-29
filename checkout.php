<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Jam Tangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white; /* Warna latar belakang biru tua */
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: blueviolet; /* Warna tema #996633 */
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        label {
            margin-bottom: 10px;
            font-weight: bold;
        }
        input, select, textarea {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: calc(100% - 22px); /* Adjusted to account for padding and borders */
        }
        .checkout-btn {
            background-color: blueviolet;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
            width: 100%;
            font-size: 1.2em;
            cursor: pointer;
        }
        .checkout-btn:hover {
            background-color: blueviolet; /* Warna hover yang lebih terang */
        }
        .product-info {
            margin-bottom: 20px;
        }
        .product-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-info th, .product-info td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .product-info th {
            background-color: #f2f2f2; /* Warna latar belakang header tabel */
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            margin-top: 40px;
            width: 100%;
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
    <div class="container">
        <h2>Checkout</h2>
        <!-- Tampilkan daftar barang yang di-checkout dalam tabel -->
        <div class="product-info">
            <h3>Barang yang akan di-checkout:</h3>
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                echo '<table>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>';
                foreach ($_SESSION['cart'] as $id => $item) {
                    $name = htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8');
                    $quantity = htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8');
                    $price = htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8');
                    $subtotal = $item['quantity'] * $item['price'];
                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$quantity</td>";
                    echo "<td>Rp" . number_format($price, 0, ',', '.') . "</td>";
                    echo "<td>Rp" . number_format($subtotal, 0, ',', '.') . "</td>";
                    echo "</tr>";
                }
                echo '</table>';
            } else {
                echo "<p>Keranjang Anda kosong.</p>";
            }
            ?>
        </div>

        <!-- Form informasi pengiriman -->
        <form method="post" action="process_checkout.php">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Alamat:</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <label for="payment_method">Metode Pembayaran:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="credit_card">Kartu Kredit</option>
                <option value="bank_transfer">Transfer Bank</option>
                <option value="cash_on_delivery">Bayar di Tempat</option>
            </select>

            <button type="submit" class="checkout-btn">Submit</button>
        </form>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Jam Tangan . Semua hak dilindungi.</p>
    </footer>
</body>
</html>