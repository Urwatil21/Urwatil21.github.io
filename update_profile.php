<?php
session_start();
require 'database.php'; // Pastikan database.php terhubung dengan benar

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $userId = $_SESSION['user_id'];

    $sql = "UPDATE users SET email = '$email' WHERE id = '$userId'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Profil berhasil diperbarui.'); window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
