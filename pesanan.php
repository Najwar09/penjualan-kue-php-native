<?php
// memanggil file header.php
include 'header.php';

// memanggil file koneksi.php
include 'koneksi.php';

$id_login = $_SESSION['user']['id_login'];


// query untuk menampilkan semua data pada tabel booking
$query = "SELECT * FROM booking WHERE id_login = $id_login ORDER BY id_booking DESC";

// perintah untuk menjalankan query di atas
$hasil = mysqli_query($connection, $query);


?>
<!-- tabel yang menampilkan pesanan -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Booking</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Telpon</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Konfirmasi Pembayaran</th>
      <th scope="col">Gambar</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($hasil as $isi) { ?>
      <tr>
        <th scope="row"><?= $no; ?></th>
        <td><?= $isi['kode_booking']; ?></td>
        <td><?= $isi['nama']; ?></td>
        <td><?= $isi['alamat']; ?></td>
        <td><?= $isi['no_tlp']; ?></td>
        <td>Rp. <?= number_format($isi['total_harga']); ?></td>
        <td><?= $isi['konfirmasi_pembayaran']; ?></td>
        <td><img src="images/<?= $isi['bukti']; ?>" height="100px"></td>
      </tr>
    <?php $no++;
    } ?>
  </tbody>
</table>


<?php
// memanggil file footer.php
include 'footer.php';
?>