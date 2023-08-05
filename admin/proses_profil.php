<?php 
include '../koneksi.php';
    $id_login = $_POST['id_login'];

	$user_baru = $_POST['username_baru'];
	$pass = $_POST['pass_baru'];
	$pass_baru = password_hash($pass, PASSWORD_DEFAULT);

	$query = "UPDATE login SET username='$user_baru', password='$pass_baru' WHERE id_login='$id_login'";
	mysqli_query($connection,$query);

	echo "<script>alert('Data berhasil di ubah!');</script>";
	echo "<script>location= 'profil.php'</script>";
?>