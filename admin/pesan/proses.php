<?php
include '../../koneksi.php';

// proses hapus data data pesan/saran
if ($_GET['aksi'] == 'hapus') {
    $id_pesan = $_GET['id'];

    $query = "DELETE FROM pesan WHERE id_pesan='$id_pesan'";
    mysqli_query($connection, $query);

    echo '<script>alert("Data berhasil di hapus!");window.location="pesan.php";</script>';
}








?>