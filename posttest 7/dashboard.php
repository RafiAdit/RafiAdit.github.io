<?php
require 'koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM request");

$request = [];

while ($row = mysqli_fetch_assoc($result)){
    $request[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Staff</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="navbar">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="cv.html">ABOUT ME</a></li>
                <li><a href="req.html">REQUEST</a></li>
                <li class="active"><a href="dashboard.php">DAFTAR REQUEST</a></li>
                <li><a href="logout.php">LOG OUT</a></li>
            </ul>
        </div>
    </header>
    <section class="dash-main">
        <h1 >Daftar Request Aquarium 
        </h1>
        <hr><br>
        <div class="leading-btn">
            <a href="req.html"><button class="add-btn">Tambah</button></a>
        </div><br>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Email</th>
                    <th>Ukuran Aquarium</th>
                    <th>Jenis Ikan</th>
                    <th>hiasan aquarium</th>
                    <th>Refrensi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach($request as $req) :?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $req["nama"] ?></td>
                    <td><?php echo $req["nomor"] ?></td>
                    <td><?php echo $req["email"] ?></td>
                    <td><?php echo $req["ukuran"] ?></td>
                    <td><?php echo $req["ikan"] ?></td>
                    <td><?php echo $req["hias"] ?></td>
                    <td><img src="uploads/<?php echo $req["refrensi"] ?>" alt="Gambar Hiasan" width="100" height="100"></td>
                    <td class="action">
                        <a href="edit.php?id=<?php echo $req["id"] ?>"><button class="edit-btn">Edit</button></a>
                        <a href="hapus.php?id=<?php echo $req["id"] ?>"><button name="hapus" class="delete-btn">Delete</button></a>
                    </td>
                </tr>
                <?php $i++; endforeach;?>
            </tbody>
        </table>
    </section>
</body>
</html>
