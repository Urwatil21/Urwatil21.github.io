<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok - Jam Tangan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }

        header {
            background-color: blueviolet; /* Warna header diubah menjadi biru tua */
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        header p {
            margin: 5px 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            text-decoration: none;
            padding: 8px 16px;
            background-color: blueviolet; /* Warna latar belakang menu diubah menjadi biru tua */
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #001f4d; /* Warna latar belakang menu diubah saat hover */
        }

        main {
            padding: 20px;
        }

        button {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: blueviolet; /* Warna tombol diubah menjadi biru tua */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #001f4d; /* Warna tombol diubah saat hover */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        table th, table td {
            border: 1px solid blueviolet; /* Warna border cell diubah menjadi biru tua */
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: blueviolet; /* Warna header kolom diubah menjadi biru tua */
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        footer {
            background-color: blueviolet; /* Warna footer diubah menjadi biru tua */
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }

        .signature p {
            margin: 0;
            padding: 0;
        }

        .signature p + p {
            margin-top: 10px;
        }

        /* Sembunyikan tombol saat cetak */
        @media print {
            button, nav, footer {
                display: none;
            }
            body {
                margin: 0;
                padding: 0;
            }
        }
    </style>
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>
    <h1>Laporan Stok Tersedia dan Terjual</h1>
<main>
    <button onclick="printReport()">Cetak Laporan</button>

    <?php
    include 'database.php';

   $sql = "SELECT p.name, p.stok_awal, p.stok_tersedia, 
        (p.stok_awal - p.stok_tersedia) AS terjual 
        FROM products p";
    $result = $conn->query($sql);

    echo "<h2>Stok Produk</h2>";
    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Nama Produk</th><th>Stok Awal</th><th>Stok Tersedia</th><th>Terjual</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["stok_awal"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["stok_tersedia"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["terjual"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tidak ada data stok.</p>";
    }
    $conn->close();
    ?>
</main>
<footer>
    &copy; 2024 Jam Tangan.
</footer>
</body>
</html>