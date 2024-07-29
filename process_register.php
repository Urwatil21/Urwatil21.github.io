<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'database.php'; // Sesuaikan path sesuai dengan struktur folder Anda

    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek duplikasi username atau email
    $checkUser = $conn->query("SELECT id FROM users WHERE username = '$username' OR email = '$email'");
    if ($checkUser->num_rows > 0) {
        echo "<script>alert('Username atau Email sudah terdaftar.'); window.history.go(-1);</script>";
    } else {
        // Insert user baru ke database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href = 'login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>
