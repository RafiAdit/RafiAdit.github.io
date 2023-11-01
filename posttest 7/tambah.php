<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];
    $ukuran = $_POST['ukuran'];
    $ikan = $_POST['ikan'];
    $hias = $_POST['hias'];

    // Proses unggah gambar
    $refrensi = $_FILES['refrensi'];
    $gambar_filename = $refrensi['name'];
    $gambar_tmp = $refrensi['tmp_name'];
    $gambar_folder = 'uploads/'; // Folder tempat menyimpan gambar
    $gambar_target = $gambar_folder . $gambar_filename;

    // Ambil tanggal saat ini dalam format tahun-bulan-tanggal
    $tanggal = date("Y-m-d");

    // Ekstrak ekstensi file
    $ekstensi = pathinfo($gambar_filename, PATHINFO_EXTENSION);

    // Gabungkan nama file dengan tanggal dan ekstensinya
    $nama_file_baru = $tanggal . " " . basename($gambar_filename, "." . $ekstensi) . "." . $ekstensi;

    // Pindahkan gambar ke folder yang ditentukan
    move_uploaded_file($gambar_tmp, $gambar_folder . $nama_file_baru);

    // Simpan nama file gambar ke database
    $result = mysqli_query($conn, "INSERT INTO request (nama, nomor, email, ukuran, ikan, hias, refrensi) VALUES ('$nama', '$nomor', '$email', '$ukuran', '$ikan', '$hias', '$nama_file_baru')");

    if ($result) {
        echo "
        <script>
            alert('Data Berhasil DiTambahkan!');
            document.location.href = 'dashboard.php'
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal DiTambahkan!');
            document.location.href = 'req.html'
        </script>";
    }
}
?>
