<?php
require "koneksi.php";

$id = $_GET["id"];

// Mengambil nama file dari database
$result = mysqli_query($conn, "SELECT refrensi FROM request WHERE id = '$id'");
if ($row = mysqli_fetch_assoc($result)) {
    $file_to_delete = $row['refrensi'];

    // Hapus file fisik dari direktori
    $file_path = 'uploads/' . $file_to_delete;
    if (file_exists($file_path) && !is_dir($file_path)) {
        unlink($file_path);
    }

    // Hapus data dari database
    $result = mysqli_query($conn, "DELETE FROM request WHERE id = '$id'");

    if ($result) {
        echo "
        <script>
        alert('Data dan File Berhasil Dihapus!');
        document.location.href = 'dashboard.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'dashboard.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
    alert('Data tidak ditemukan!');
    document.location.href = 'dashboard.php';
    </script>
    ";
}
?>
