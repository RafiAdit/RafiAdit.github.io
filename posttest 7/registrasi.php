<?php
require 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        // $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "SELECT username FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0) {
            $insertQuery = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

            if (mysqli_query($conn, $insertQuery)) {
                echo "<script>alert('Pendaftaran berhasil! Silakan login.');
                document.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Pendaftaran gagal. Silakan coba lagi.');
                document.location.href = 'registrasi.php';</script>";
            }
        } else {
            echo "<script>alert('Username sudah digunakan. Silakan pilih username lain.');
            document.location.href = 'registrasi.php';</script>";
        }
    } else {
        echo "<script>alert('Password tidak sama. Silakan coba lagi.');
        document.location.href = 'registrasi.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
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
            <h1>Register</h1><hr>
            
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" class="textfield">
                <input type="password" name="password" placeholder="Password" class="textfield">
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" autocomplete="off" class="textfield" required> <br>
                <button type="submit" name="register" class="login-btn">Register</button>
                <p><a href="login.php">Login</a></p>
                    <p><a href="index.php">Kembali</a></p>
            </form>
        </div>
    </div>
</body>

</html>