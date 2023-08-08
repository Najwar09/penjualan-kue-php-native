<?php
include 'header.php';
include 'koneksi.php';

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "sukses") {
        echo "<script>alert('pesanan telah ditambahkan');</script>";
    } else if ($_GET['pesan'] == "hapus") {
        echo "<script>alert('pesanan telah dihapus');</script>";
    }
}

if (empty($_SESSION['pesanan']) || !isset($_SESSION['pesanan'])) {
    echo "<script>alert('anda belum memesan, silahkan pesan terlebih dahulu');</script>";
    echo "<script>location='product.php';</script>";
}



?>

<div class="container">
    <h2>Keranjang</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">SubTotal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1;
            $idd = $_SESSION['user']['id_login'];
            $totalbelanja = 0;
            foreach ($_SESSION["pesanan"] as $id_coklat => $jumlah) {
                include('koneksi.php');
                // meampilkan produk yang dipesan
                $hasil = mysqli_query($connection, "SELECT * FROM coklat WHERE id_coklat='$id_coklat'");

                $isi = mysqli_fetch_assoc($hasil);
                // menjumlahkan subtotalnya
                $subharga = $isi['harga'] * $jumlah;


            ?>
                <tr>
                    <td><?= $nomor; ?></td>
                    <td><img src="images/<?= $isi['gambar']; ?>" width="100px"></td>
                    <td><?= $isi['nama_coklat']; ?></td>
                    <td>Rp. <?= number_format($isi['harga']); ?></td>
                    <td><?= $jumlah; ?> /Pcs</td>
                    <td><?= number_format($subharga); ?></td>
                    <td><a href="proses.php?id=<?= $isi['id_coklat']; ?>&aksi=hapus_keranjang" class="btn btn-danger">Hapus</a></td>
                </tr>
            <?php $nomor++;
                $totalbelanja += $subharga;
            } ?>
            <tr>
                <th colspan="4">Total Belanja</th>
                <th colspan="2">Rp. <?php echo number_format($totalbelanja); ?></th>
            </tr>
        </tbody>
    </table>
</div>

<div class="ms-5">
    <form method="POST" action="">
        <div class="tpesan">
            <a href="product.php" class="btn btn-primary btn-sm">Lihat Menu</a>
            <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
        </div>
    </form>
</div>
<!-- masukkan ke database booking -->
<?php
if (isset($_POST['konfirm'])) {

    $kode_booking = time();
    $tanggal = date("y-m-d");
    $hasil = mysqli_query($connection, "INSERT INTO booking VALUES ('','$idd','$kode_booking','','','','$totalbelanja','belum bayar','','$tanggal')");

    // Mendapatkan ID barusan
    $id_terbaru = $connection->insert_id;

    // Menyimpan data ke tabel pemesanan produk
    foreach ($_SESSION["pesanan"] as $id_coklat => $jumlah) {
        $hasil = mysqli_query($connection, "SELECT * FROM coklat WHERE id_coklat='$id_coklat'");
        $isi = mysqli_fetch_assoc($hasil);
        $gambar = $isi['gambar'];
        $nama_coklat = $isi['nama_coklat'];
        $harga = $isi['harga'];

        $sub = $harga * $jumlah;
        $stok = $isi['stok'] - $jumlah;
        $hasil = mysqli_query($connection, "INSERT INTO keranjang VALUES ('', '$id_coklat','$kode_booking', '$idd', '$gambar','$nama_coklat','$harga','$jumlah','$sub') ");
        $hasil2 = mysqli_query($connection, "UPDATE coklat SET stok='$stok' WHERE id_coklat=$id_coklat");
        
        if ($stok == 0) {
            $hasil2 = mysqli_query($connection, "UPDATE coklat SET status='habis' WHERE id_coklat=$id_coklat");
        }
    }

    // Mengosongkan pesanan
    unset($_SESSION["pesanan"]);

    // Dialihkan ke halaman nota
    echo "<script>alert('Pemesanan Sukses!');</script>";
    echo "<script>location= 'konfirmasi.php?id=$kode_booking'</script>";
}
?>

<?php
include 'footer.php';

?>