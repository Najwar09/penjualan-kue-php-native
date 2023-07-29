<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_coklat_online";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}












?>