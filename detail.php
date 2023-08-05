<?php
include 'header.php';
include 'koneksi.php';

$id_coklat = $_GET['id_coklat'];

$query = "SELECT * FROM coklat WHERE id_coklat = '$id_coklat'";
$hasil = mysqli_query($connection, $query);
$isi = mysqli_fetch_assoc($hasil);

if (empty($_SESSION['user'])) {
    echo '<script>alert("Harap login !");window.location="index.php"</script>';
  }

?>



<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form action="proses.php?id=<?= $isi['id_coklat']; ?>&aksi=keranjang" method="POST">

                <!-- menampilkan gambar dari tabel kue -->
                <img class="card-img-top w-100" style="object-fit:cover;" src="images/<?= $isi['gambar']; ?>">
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <!-- menampilkan deskripsi kue dari tabel kue -->
                    <p class="card-text">
                        Deskripsi :
                        <?= $isi['deskripsi']; ?>
                    </p>

                    <!-- jika status kue tersedia == tersedia maka akan tampil informasi tersedia -->
                    <!-- jika status kue habis maka akan tampil informasi habis -->
                    <ul class="list-group list-group-flush">
                        <?php if ($isi['status'] == 'tersedia') { ?>
                            <li class="list-group-item bg-primary text-white">
                                <i class="fa fa-check"></i> Tersedia
                            </li>
                        <?php } else { ?>
                            <li class="list-group-item bg-danger text-white">
                                <i class="fa fa-close"></i> Habis
                            </li>
                        <?php } ?>

                        <!-- menampilkan stok kue dari tabel kue -->
                        <li class="list-group-item bg-success text-white">
                            <i class="fa fa-check"></i> Sisa
                            <?= $isi['stok']; ?> Pcs

                        </li>
                        <!-- menampilkan harga kue dari tabel kue -->
                        <li class="list-group-item bg-dark text-white">
                            <i class="fa fa-money"></i> Rp. <?= number_format($isi['harga']); ?>/ pcs
                        </li>
                        <br>
                        <li>
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" value="1">
                            <input type="text" value="<?= $isi['nama_coklat']; ?>" name="nama_coklat" hidden>
                            <input type="text" value="<?= $isi['harga']; ?>" name="harga" hidden>
                            <input type="text" value="<?= $isi['stok']; ?>" name="stok" hidden>
                            <input type="text" value="<?= $isi['deskripsi']; ?>" name="deskripsi" hidden>
                            <input type="text" value="<?= $isi['status']; ?>" name="status" hidden>
                            <input type="text" value="<?= $isi['gambar']; ?>" name="gambar" hidden>
                            <button>Tambah Ke Keranjang</button>
                            </form>
                        </li>
                    </ul>
                    <hr />

                    <!-- tombol booking now dan back -->
                    <center>
                        <a href="index.php" class="btn btn-info">Kembali</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';

?>