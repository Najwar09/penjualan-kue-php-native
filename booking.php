<?php
include 'koneksi.php';
include 'header.php';

if (empty($_SESSION['user'])) {
  echo '<script>alert("Harap login !");window.location="index.php"</script>';
}

$id_coklat = $_GET['id_coklat'];

$query = "SELECT * FROM coklat WHERE id_coklat = '$id_coklat'";
$hasil = mysqli_query($connection, $query);
$isi = mysqli_fetch_assoc($hasil);

?>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <!-- menampilkan gambar dari database -->
      <div class="card" style="border: gray solid 6px;">
        <img src="images/<?= $isi['gambar']; ?>" class="card-img-top" style="height:500px;">
      </div>
    </div>



    <!-- FORM UNTUK MENGINPUT DATA PEMBELI KUE PADA HALAMAN BOOKING -->
    <div class="col-sm-8">
      <div class="card">
        <div class="card-body">
          <h1><i><?= strtoupper($isi['nama_coklat']); ?></i></h1>
          <h3><i>Rp. <?= number_format($isi['harga']); ?></i></h3>
          <br>

          <form method="post" action="proses.php?id=booking">
            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" name="nama" required class="form-control" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <label for="">Alamat Lengkap</label>
              <input type="text" name="alamat" required class="form-control" placeholder="Alamat Lengkap">
            </div>
            <div class="form-group">
              <label for="">Telepon</label>
              <input type="text" name="telpon" required class="form-control" placeholder="Telepon">
            </div>
            <div class="form-group">
              <label for="">Jumlah Pesanan</label>
              <input type="number" name="jumlah" required class="form-control" placeholder="Masukkan Jumlah Yang Ingin Di Pesan!" value="1">
            </div>


            <input type="hidden" value="<?= $isi['id_coklat']; ?>" name="id_coklat">
            <input type="hidden" value="<?= $isi['nama_coklat']; ?>" name="nama_coklat">
            <input type="hidden" value="<?= $isi['harga']; ?>" name="harga">
            <input type="hidden" value="<?= $isi['stok']; ?>" name="stok">
            <input type="hidden" value="<?= $isi['gambar']; ?>" name="gambar">
            <hr />
            <!-- jika status kue tersedia maka akan tampil tombol booking now -->
            <!-- jika status kue habil maka tombol booking now akan hilang -->
            <?php if ($isi['status'] == 'tersedia') { ?>
              <button type="submit" class="btn btn-dark float-right text-light">Pesan</button>
            <?php } else { ?>
              <button type="submit" class="btn btn-danger float-right" disabled>Pesan</button>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
include 'footer.php';

?>