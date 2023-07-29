<?php
include '../../koneksi.php';

    $status = $_POST['status'];
    $id_booking = $_POST['id_booking'];
    $query = "UPDATE booking SET konfirmasi_pembayaran='$status' WHERE id_booking= '$id_booking'";
    mysqli_query($connection,$query);
    
    echo '<script>alert("berhasil di ubah");history.go(-1);</script>'; 

?>