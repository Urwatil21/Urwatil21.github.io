<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Kata Sandi - Dunia Laptop</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path jika diperlukan -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #990000;
            color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            color: white;
            margin-bottom: 20px;
        }
        .login-container label {
            display: block;
            font-size: 16px;
            color: white;
            margin-bottom: 10px;
            text-align: left;
        }
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-container input[type="submit"] {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-container input[type="submit"]:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <p>welcome to "Dunia_Laptop"</p>
        <center><img src="GITAR/logo.png" height="80" weight="80"/></center>
        <h2>Ganti Kata Sandi</h2>
        <form action="process_change_password.php" method="post">
            <label for="new_password">Kata Sandi Baru:</label>
            <input type="password" id="new_password" name="new_password" required>
            
            <label for="confirm_password">Konfirmasi Kata Sandi Baru:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            
            <input type="submit" value="Ganti Kata Sandi">
        </form>
    </div>
</body>
</html>
