<?php
// memanggil file koneksi.php
include 'koneksi.php';

// memanggil file header.php
include 'header.php';

// jika user belum login maka akan muncul alert harap login
if (empty($_SESSION['user'])) {
  echo '<script>alert("Harap login !");window.location="index.php"</script>';
}

// mengambil data id_coklat dan disimpan pada variabel $id_coklat
$id_coklat = $_GET['id_coklat'];

// query untuk mengambil semua data pada tabel coklat berdasarkan variabel id_coklat diatas
$query = "SELECT * FROM coklat WHERE id_coklat = '$id_coklat'";

// perintah untuk menjalankan query diatas
$hasil = mysqli_query($connection, $query);
// mengubah data dari database yang telah diambil menjadi array asosiatif
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



    <!-- form untuk menginput data pesanan  -->
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
              <input type="number" name="jumlah" required class="form-control" disabled placeholder="Masukkan Jumlah Yang Ingin Di Pesan!" value="1">
            </div>


            <input type="hidden" value="<?= $isi['id_coklat']; ?>" name="id_coklat">
            <input type="hidden" value="<?= $isi['nama_coklat']; ?>" name="nama_coklat">
            <input type="hidden" value="<?= $isi['harga']; ?>" name="harga">
            <input type="hidden" value="<?= $isi['stok']; ?>" name="stok">
            <input type="hidden" value="<?= $isi['gambar']; ?>" name="gambar">
            <hr />
            <!-- jika status coklat tersedia maka akan tampil tombol booking now -->
            <!-- jika status coklat habil maka tombol booking now akan hilang -->
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
// memanggil file footer.php
include 'footer.php';

?>