<?php
// memanggil file header.php
include 'header.php';

// memanggil file koneksi.php
include 'koneksi.php';

// query untuk mengambil semua data pada tabel coklat berdasarkan id_coklat
$query = "SELECT * FROM coklat ORDER BY id_coklat DESC";

// perintan untuk menjalankan query diatas
$hasil = mysqli_query($connection, $query);
?>


<!-- produk coklat -->
<div class="container">
  <div class="row g-5">
    <!-- menampilkan semua berdasarkan jumlah data pada tabel coklat -->
    <?php foreach ($hasil as $isi) { ?>
      <div class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="images/<?= $isi['gambar']; ?>" class="card-img-top" height="200px">
          <div class="card-body">
            <h5 class="card-title"><b><?= $isi['nama_coklat']; ?></b></h5>
            <p class="card-text"><?= $isi['status']; ?></p>
            <p class="card-text">Rp. <?= number_format($isi['harga']); ?></p>
            <p class="card-text">Sisa <?= $isi['stok']; ?> /Pcs</p>
            <center>
              <!-- jika status coklat tersedia maka tombol beli akan tampil -->
              <!-- sedangkan jika status coklat habis maka tombol beli akan hilang -->
              <?php if ($isi['status'] == 'tersedia') { ?>
                <a href="booking.php?id_coklat=<?= $isi['id_coklat'] ?>" class="btn btn-success">Beli</a>
              <?php } else { ?>
                <button class="btn btn-success" disabled><a href="booking.php?id_coklat=<?= $isi['id_coklat'] ?>"></a>beli</button>
              <?php } ?>
              <a href="detail.php?id_coklat=<?= $isi['id_coklat']; ?>" class="btn btn-primary">Rincian</a>
            </center>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>





<?php
// memanggil file footer.php
include 'footer.php';
?>