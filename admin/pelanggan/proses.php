<?php
include '../../koneksi.php';

// proses hapus data user/pelanggan
if ($_GET['aksi'] == 'hapus') {
    $id_login = $_GET['id'];

    $query = "DELETE FROM login WHERE id_login='$id_login'";
    mysqli_query($connection, $query);

    echo '<script>alert("Data berhasil di hapus!");window.location="pelanggan.php";</script>';
}








?>