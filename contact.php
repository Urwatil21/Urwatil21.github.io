<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #003399;
            line-height: 1.6;
            margin: 0; /* Menghapus margin default body */
            padding: 0; /* Menghapus padding default body */
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #000;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: blueviolet;
            margin-bottom: 10px;
        }

        .header p {
            color: #000;
            margin-bottom: 10px; /* Menambahkan margin bottom pada paragraf header */
        }

        .contact-info {
            margin-bottom: 20px;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 10px;
        }

        .contact-info h2 {
            color: blueviolet;
            margin-bottom: 10px;
        }

        .contact-info p {
            margin-bottom: 5px;
            color: #000;
        }

        .contact-form {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }

        .contact-form label {
            color: blueviolet;
            font-weight: bold;
            display: block; /* Membuat label menjadi block untuk memisahkan elemen secara vertikal */
            margin-bottom: 5px; /* Menambahkan margin bottom pada label */
        }

        .contact-form input,
        .contact-form textarea {
            width: calc(100% - 22px); /* Mengatur lebar input dan textarea agar tidak terlalu lebar */
            padding: 10px;
            border: 1px solid blueviolet;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px; /* Menambahkan margin bottom pada input dan textarea */
        }

        .contact-form button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: blueviolet;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block; /* Membuat tombol menjadi block agar tidak terlalu dekat dengan input */
            width: 100%; /* Mengatur agar tombol mengisi seluruh lebar form */
        }

        .contact-form button:hover {
            background-color: #002266;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Kontak Kami</h1>
            <p>Alamat : Jl.Raya Lubuk Begalung,39, Padang</p>
            <p>Telepon: (08)12-9238-7930</p>
            <p>Email   : JamTangan@gmail.com</p>
        </header>
        <div class="contact-info">
        </div>
        <form action="#" method="post" class="contact-form">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Pesan:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            
            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
