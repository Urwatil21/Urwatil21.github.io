<?php
session_start();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($action == 'add' && $id > 0) {
    $conn = new mysqli('localhost', 'root', '', 'shopping_cart');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query("SELECT * FROM products WHERE id = $id");
    $product = $result->fetch_assoc();

    if ($product) {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }
        $_SESSION['cart'] = $cart;
    }

    $conn->close();
    header('Location: keranjang.php');
    exit();
}

if ($action == 'remove' && $id > 0) {
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    if (isset($cart[$id])) {
        unset($cart[$id]);
        $_SESSION['cart'] = $cart;
    }

    header('Location: keranjang.php');
    exit();
}

header('Location: product.php');
exit();
