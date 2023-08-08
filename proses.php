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
// if ($_GET['id'] == 'booking') {

// 	$nama = $_POST['nama'];
// 	$alamat = $_POST['alamat'];
// 	$telpon = $_POST['telpon'];
// 	$jumlah = $_POST['jumlah'];


// 	$id_coklat = $_POST['id_coklat'];
// 	$nama_coklat = $_POST['nama_coklat'];
// 	$harga = $_POST['harga'];
// 	$stok = $_POST['stok'];
// 	$gambar = $_POST['gambar'];

// 	$total = $harga * $jumlah;
// 	$konfirmasi_pembayaran = 'belum bayar';
// 	$tgl_input = date('y-m-d');
// 	$bukti = "";
// 	$kode_booking = time();

// 	session_start();
// 	$user = $_SESSION['user']['id_login'];




// 	$query = "INSERT INTO booking VALUES('', '$user','$kode_booking','$id_coklat','$nama','$alamat','$telpon','$jumlah','$total','$konfirmasi_pembayaran','$tgl_input','$bukti')";
// 	// var_dump($query);
// 	mysqli_query($connection, $query);
// 	// var_dump($tes);

// 	echo '<script>alert("Terima Kasih!Silahkan Melakukan Pembayaran!");window.location="bayar.php?id=' . time() . '";</script>';
// }


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
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$no_telpon = $_POST['no_telpon'];
			$konfirmasi_pembayaran = "sedang di proses";



			$query = "UPDATE booking SET nama='$nama', alamat='$alamat',no_tlp=$no_telpon, konfirmasi_pembayaran = '$konfirmasi_pembayaran',bukti = '$newfilename' WHERE id_booking = '$id_booking'";
			$hasil = mysqli_query($connection, $query);

			echo '<script>alert("sedang di proses");window.location="index.php";</script>';
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
	$isi = mysqli_fetch_assoc($hasil);



	if (mysqli_num_rows($hasil) == 1) {

		if (password_verify($pass, $isi['password'])) {
			session_start();
			$_SESSION['user'] = $isi;
			if ($isi['level'] == 'admin') {
				echo '<script>alert("Login Sukses");window.location="admin/index.php";</script>';
			} else {
				echo '<script>alert("Login Sukses!");window.location="index.php";</script>';
			}
		} else {

			echo '<script>alert("gagal login!");window.location="index.php";</script>';
		}
	} else {
		echo '<script>alert("gagal login!");window.location="index.php";</script>';
	}
}


// menambahkan coklat ke keranjang
if ($_GET['aksi'] == 'keranjang') {
	session_start();
	//ambil id coklat
	$id_coklat = $_GET['id'];
	$jumlah = $_POST['jumlah'];
	$query = "SELECT * FROM coklat WHERE id_coklat='$id_coklat'";
	$hasil = mysqli_query($connection, $query);
	$isi = mysqli_fetch_assoc($hasil);

	if ($jumlah <= $isi['stok'] && $jumlah >= 1) {
		if (isset($_SESSION['pesanan'][$id_coklat])) {
			$_SESSION['pesanan'][$id_coklat] += $jumlah;
		} else {
			$_SESSION['pesanan'][$id_coklat] = $jumlah;
		}
		header("location:keranjang.php?pesan=sukses");
	}
	echo '<script>alert("Jumlah yang anda masukkan salah!");window.location="index.php";</script>';
}

// hapus coklat di keranjang
if ($_GET['aksi'] == 'hapus_keranjang') {
	session_start();
	$id_coklat = $_GET['id'];
	unset($_SESSION['pesanan'][$id_coklat]);

	header("location:keranjang.php?pesan=hapus");
}

// update username atau password dari user
if ($_GET['id'] == 'update_user') {
	$id_login = $_POST['id_login'];
	$user_baru = $_POST['username_baru'];
	$pass = $_POST['pass_baru'];
	$pass_baru = password_hash($pass, PASSWORD_DEFAULT);

	$query = "UPDATE login SET username='$user_baru', password='$pass_baru' WHERE id_login='$id_login'";
	mysqli_query($connection, $query);

	echo "<script>alert('Data berhasil di ubah!');</script>";
	echo "<script>location= 'profil.php'</script>";
}
