<?php
// Koneksi ke database (misal menggunakan MySQLi)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jam_tangan";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel users
$sql = "SELECT username, email, password FROM users";
$result = $conn->query($sql);

// Tangkap error jika query tidak berhasil
if (!$result) {
    die("Error: " . $conn->error);
}

// Jika ada data, tampilkan dalam tabel HTML
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Pengguna</title>
<link rel="stylesheet" href="styles.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1000px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    h1 {
        color: blueviolet;
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    table th {
        background-color: blueviolet;
        color: #fff;
    }

    table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tbody tr:hover {
        background-color: #e0e0e0;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Laporan Pengguna</h1>
    <center><h3>Jam Tangan</h3></center>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop untuk menampilkan setiap baris data dari hasil query
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>