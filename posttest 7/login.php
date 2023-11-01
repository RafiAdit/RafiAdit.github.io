<?php
require 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
            // Login berhasil, arahkan ke req.html
            header("Location: req.html");
            exit;
    }

    // Jika login gagal, arahkan kembali ke halaman login
    header("Location: login.php");
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>        
    <style>    
        body {
            background-color: #ff8800;
            font-size: 14px;
            line-height: 22px;
            color: #555555;
        }
        h1 {
            color: black;
        }

        .form {
            text-align: center;
            margin: 100px auto;
            max-width: 400px;
        }

        .form-container {
            background-color: orangered;
            padding: 20px;
            border: 2px solid black;
            border-radius: 5px;
            box-shadow: 0 0 10px;
        }

        .textfield {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-btn {
            background-color: transparent;
            color: black;
            margin-top: 15px;
            padding: 10px;
            border: 1px solid;
            border-radius: 3px;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: black;
            color: orangered;
        }

        a {
            text-decoration: none;
            color: blue;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
        <div class="form">
            <div class="form-container">
                <h1>Login</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="text" id="username" name="username" placeholder="Username" class="textfield" required>
                    <br>
                    <input type="password" id="password" name="password" placeholder="Password" class="textfield" required>
                    <br>
                    <button type="submit" name="login" class="login-btn">Login</button>
                    <p>Belum Punya Akun?<a href="registrasi.php">Registrasi</a></p>
                    <p><a href="index.php">Kembali</a></p>
                </form>

            </div>
        </div>
</body>
</html>