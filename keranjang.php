<?php
include 'header.php';
include 'koneksi.php';

if (empty($_SESSION['user'])) {
    echo '<script>alert("Harap login !");window.location="index.php"</script>';
}

// mengambil data id_coklat dan disimpan pada variabel $id_coklat
$id_coklat = $_GET['id_coklat'];

// query untuk mengambil semua data pada tabel coklat berdasarkan variabel id_coklat diatas
$query = "SELECT coklat.*, booking.* FROM coklat JOIN booking ON coklat.id_coklat = booking.id_coklat WHERE id_booking = $id_coklat";
// "SELECT * FROM coklat WHERE id_coklat = '$id_coklat'";

// perintah untuk menjalankan query diatas
$hasil = mysqli_query($connection, $query);
// mengubah data dari database yang telah diambil menjadi array asosiatif
$isi = mysqli_fetch_assoc($hasil);
var_dump($isi);


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
                <th scope="col">Qty</th>
                <th scope="col">SubTotal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <form action="proses.php?id=booking" method="post">
                <?php $no = 1; ?>
                <?php
                foreach ($hasil as $hsl) {
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><img src="images/<?= $hsl['gambar']; ?>" width="100" alt=""></td>
                        <td><?= $hsl['nama_coklat'] ?></td>
                        <td>Rp. <?= number_format($hsl['harga']) ?></td>
                        <td>
                            <input type="number" name="qty" class="form-control" style="text-align: center;" value="<?= $hsl['jumlah']; ?>">
                        </td>
                        <td>tes</td>
                        <td>
                            <button type="submit" name="" class="btn btn-warning">Update</button>
                            | <a href="" class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus ?')">Delete</a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php } ?>
            </form>
            <tr>
                <td colspan="7" style="text-align: right; font-weight: bold;">Grand Total = Rp.</td>
            </tr>
            <tr>
                <td colspan="7" style="text-align: right; font-weight: bold;"><a href="index.php" class="btn btn-success">Lanjutkan Belanja</a> <a href="" class="btn btn-primary">Checkout</a></td>
            </tr>
        </tbody>
    </table>
</div>

<?php
include 'footer.php';

?>