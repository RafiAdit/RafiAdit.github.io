<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Formulir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Hasil Formulir Custom Aquarium</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $nomor = $_POST["nomor"];
            $email = $_POST["email"];
            $ukuran = $_POST["ukuran"];
            $ikan = $_POST["ikan"];
            $hias = $_POST["hias"];

            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>Nomor WhatsApp:</strong> $nomor</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Ukuran Aquarium:</strong> $ukuran</p>";
            echo "<p><strong>Jenis Ikan yang Diinginkan:</strong> $ikan</p>";
            echo "<p><strong>Hiasan yang Diinginkan:</strong> $hias</p>";
        }
        ?>
    </div>
</body>
</html>











