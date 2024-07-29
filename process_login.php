<?php
session_start();
require 'database.php'; // Pastikan file database.php terhubung dengan benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Lakukan query untuk mencari user dengan username yang diberikan
    $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($password, $user['password'])); {
            // Jika password benar, set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Redirect ke halaman utama
            header("Location: index.php");
        } 
    } else; {
        // Jika username tidak ditemukan
        echo "<script>alert('Username tidak ditemukan!'); window.history.back();</script>";
    }
    $conn->close();
}
?>
