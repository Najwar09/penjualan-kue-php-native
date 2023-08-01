<?php
// memanggil file koneksi.php
include 'koneksi.php';

// jika tidak ada variabel id maka akan di arahkan ke halaman index.php
if (!isset($_GET['id'])) {
	header("location:index.php");
	exit();
}




// proses menambahkan saran dari user ke database
if ($_GET['id'] == 'kontak') {

	$nama = $_POST['nama'];
	$telpon = $_POST['telpon'];
	$email = $_POST['email'];
	$pesan = $_POST['pesan'];
	$query = "INSERT INTO pesan VALUES('','$nama','$telpon','$email','$pesan')";
	mysqli_query($connection, $query);

	echo '<script>alert("Terima Kasih telah memberikan sarannya!");history.back();</script>';
}



// proses booking pesanan
if ($_GET['id'] == 'booking') {

	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telpon = $_POST['telpon'];
	$jumlah = $_POST['jumlah'];


	$id_coklat = $_POST['id_coklat'];
	$nama_coklat = $_POST['nama_coklat'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$gambar = $_POST['gambar'];

	$total = $harga * $jumlah;
	$konfirmasi_pembayaran = 'belum bayar';
	$tgl_input = date('y-m-d');
	$bukti = "";
	$kode_booking = time();




	$query = "INSERT INTO booking VALUES('','$kode_booking','$id_coklat','$nama','$alamat','$telpon','$jumlah','$total','$konfirmasi_pembayaran','$tgl_input','$bukti')";
	mysqli_query($connection, $query);

	echo '<script>alert("Terima Kasih!Silahkan Melakukan Pembayaran!");window.location="bayar.php?id=' . time() . '";</script>';
}


// proses menambahkan bukti pembayaran dari user ke database
if ($_GET['id'] == 'konfirmasi') {
	$dir = 'images/';
	$tmp_name = $_FILES['bukti']['tmp_name'];
	$temp = explode(".", $_FILES["bukti"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	$target_path = $dir . basename($newfilename);
	$allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg", "image/png",   "image/x-png");

	if ($_FILES['bukti']["error"] > 0) {
		echo '<script>alert("Error file");history.go(-1)</script>';
		exit();
	} elseif (round($_FILES['bukti']["size"] / 1024) > 4096) {
		echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB !");history.go(-1)</script>';
		exit();
	} else {
		if (move_uploaded_file($tmp_name, $target_path)) {
			$id_booking = $_POST['id_booking'];
			$konfirmasi_pembayaran = "sedang di proses";



			$query = "UPDATE booking SET konfirmasi_pembayaran = '$konfirmasi_pembayaran',bukti = '$newfilename' WHERE id_booking = '$id_booking'";
			$hasil = mysqli_query($connection, $query);

			echo '<script>alert("sedang di proses");history.go(-2);</script>';
		}
	}
}

// daftar user baru
if ($_GET['id'] == 'daftar') {
	$user = $_POST['user'];
	$pass = mysqli_real_escape_string($connection, $_POST['pass']);
	$level = "pengguna";

	// enkripsi password
	$pass = password_hash($pass, PASSWORD_DEFAULT);

	// cek apakah username sudah ada atau belum
	$cek = "SELECT username FROM login WHERE username = '$user'";
	$akhir = mysqli_query($connection, $cek);
	if (mysqli_fetch_assoc($akhir)) {
		echo '<script>alert("username sudah ada!");history.back();</script>';
	} else {
		$query = "INSERT INTO login VALUES('','$user','$pass','$level')";
		mysqli_query($connection, $query);
		if (mysqli_affected_rows($connection) > 0) {
			echo '<script>alert("berhasil registrasi");history.back();</script>';
		} else {
			echo '<script>alert("gagal registrasi");history.back();</script>';
		}
	}
}

// login
if ($_GET['id'] == 'login') {
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$query = "SELECT * FROM login WHERE username = '$user'";
	$hasil = mysqli_query($connection, $query);


	if (mysqli_num_rows($hasil) == 1) {
		session_start();
		$isi = mysqli_fetch_assoc($hasil);
		
		$_SESSION['user'] = $isi;
	
		if ($isi['level'] == 'admin') {
			echo '<script>alert("Login Sukses");window.location="admin/index.php";</script>';
		} else {
			echo '<script>alert("Login Sukses!");window.location="index.php";</script>';
		}
	} else {
		echo '<script>alert("gagal login!");window.location="index.php";</script>';
	}
}
