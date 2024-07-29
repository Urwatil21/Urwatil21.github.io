<?php
session_start();
require 'database.php'; // Ensure database.php connects correctly

if(isset($_POST['name'], $_POST['address'], $_POST['payment_method'], $_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Data from checkout form
    $name = $conn->real_escape_string($_POST['name']);
    $address = $conn->real_escape_string($_POST['address']);
    $paymentMethod = $conn->real_escape_string($_POST['payment_method']);
    $totalPrice = 0;

    // Begin MySQL transaction
    $conn->autocommit(FALSE);

    try {
        // Calculate total price and update stock
        foreach($_SESSION['cart'] as $productId => $item) {
            $quantity = $item['quantity'];

            // Use prepared statement to prevent SQL injection
            $stmt = $conn->prepare("SELECT id, name, price, stok_tersedia FROM products WHERE id = ?");
            if (!$stmt) {
                throw new Exception("Prepare statement failed: " . $conn->error);
            }
            $stmt->bind_param("i", $productId);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0) {
                $product = $result->fetch_assoc();
                $totalPrice += $product['price'] * $quantity;

                // Reduce product stock
                $newStock = $product['stok_tersedia'] - $quantity;
                
                // Update product
                $updateProductQuery = "UPDATE products SET stok_tersedia = ? WHERE id = ?";
                $updateStmt = $conn->prepare($updateProductQuery);
                if (!$updateStmt) {
                    throw new Exception("Prepare statement failed: " . $conn->error);
                }
                $updateStmt->bind_param("ii", $newStock, $productId);
                $updateStmt->execute();
            } else {
                throw new Exception("Product with ID $productId not found.");
            }
        }

        // Insert data into orders table
        $insertOrderQuery = "INSERT INTO orders (name, address, payment_method, total_price, status, order_date)
                             VALUES (?, ?, ?, ?, 'pending', NOW())";
        $stmt = $conn->prepare($insertOrderQuery);
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }
        $stmt->bind_param("sssd", $name, $address, $paymentMethod, $totalPrice);
        $stmt->execute();
        $orderId = $stmt->insert_id; // Get the ID of the newly inserted order

        // Insert product details into order_items table
        foreach($_SESSION['cart'] as $productId => $item) {
            $quantity = $item['quantity'];
            $insertDetailQuery = "INSERT INTO order_items (order_id, product_id, name, quantity, price)
                                  VALUES (?, ?, ?, ?, ?)";
            $detailStmt = $conn->prepare($insertDetailQuery);
            if (!$detailStmt) {
                throw new Exception("Prepare statement failed: " . $conn->error);
            }
            $detailStmt->bind_param("iisid", $orderId, $productId, $item['name'], $quantity, $item['price']);
            $detailStmt->execute();
        }

        // Commit transaction if all queries succeed
        $conn->commit();
        
        // Empty the shopping cart after checkout
        unset($_SESSION['cart']);
        
        // Redirect to index page with success message
        header("Location: index.php?pesan=Pesanan Anda telah berhasil diproses.");
        exit;
    } catch (Exception $e) {
        // Rollback transaction if an error occurs
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    } finally {
        // Set autocommit back to true
        $conn->autocommit(TRUE);
    }
} else {
    header("Location: checkout.php");
    exit;
}
?>