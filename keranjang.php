<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Jam Tangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: blueviolet;
            font-size: 2.5em;
        }
        .cart-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .cart-icon img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: blueviolet;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .total-price {
            text-align: right;
            margin-top: 20px;
            font-size: 1.5em;
            color: blueviolet;
        }
        .checkout-btn {
            display: block;
            background-color: blueviolet;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            margin: 20px 0;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            font-size: 1.2em;
        }
        .checkout-btn:hover {
            background-color: blueviolet;
            transform: scale(1.05);
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
    </style>
</head>
<body>
    <div class="container">
        <div class="cart-icon">
            <h1>Keranjang Belanja</h1>
        </div>
        
        <form action="checkout.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Centang</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $id => $item) {
                            $name = htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8');
                            $quantity = htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8');
                            $price = htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8');
                            echo "<tr>";
                            echo "<td><input type='checkbox' class='item-checkbox' name='selected_products[]' value='$id'></td>";
                            echo "<td>$name</td>";
                            echo "<td>$quantity</td>";
                            echo "<td class='item-price'>Rp" . number_format($price * $quantity, 0, ',', '.') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Keranjang Anda kosong.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="total-price">
                Total: <span id="total-price">Rp0</span>
            </div>

            <button type="submit" class="checkout-btn">Checkout</button>
        </form>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Jam Tangan. Semua hak dilindungi.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('.item-checkbox');
            const totalPriceElement = document.getElementById('total-price');

            function calculateTotalPrice() {
                let total = 0;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const itemQuantity = parseInt(checkbox.parentElement.parentElement.querySelector('td:nth-child(3)').innerText);
                        const itemPrice = parseInt(checkbox.parentElement.parentElement.querySelector('.item-price').innerText.replace('Rp', '').replace(/\./g, ''));
                        total += itemQuantity * itemPrice;
                    }
                });
                totalPriceElement.innerText = `Rp${total.toLocaleString('id-ID')}`;
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', calculateTotalPrice);
            });
        });
    </script>
</body>
</html>
