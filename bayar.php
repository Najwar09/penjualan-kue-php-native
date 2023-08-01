<?php
// memanggil file koneksi.php
include 'koneksi.php';

// memanggil file header.php
include 'header.php';

// mengambil data id dan disimpan pada variabel $kode_booking
$kode_booking = $_GET['id'];
// query untuk mengambil semua data pada tabel booking berdasarkan variabel kode_booking diatas
$query = "SELECT * FROM booking WHERE kode_booking = '$kode_booking'";
// perintah untuk menjalankan query diatas
$hasil = mysqli_query($connection, $query);
// mengubah data yang telah diambil dari database dan diubah menjadi array asosiatif
$isi = mysqli_fetch_assoc($hasil);

$id_coklat = $isi['id_coklat'];
$query2 = "SELECT * FROM coklat WHERE id_coklat = '$id_coklat'";
$hasil2 = mysqli_query($connection, $query2);
$isi2 = mysqli_fetch_assoc($hasil2);
?>


<div class="container">
    <div class="row">
        <div class="col-sm-4">

            <!-- INFORMASI MENGENAI REKENING PEMBAYARAN -->
            <div class="card">
                <!-- menampilkan informasi tentang nomor rekening toko kue -->
                <div class="card-body" style="height: 310px; background-color: lightgray;">
                    <center>
                        <h3>Pembayaran Dapat Melalui :</h3>
                        <hr />
                        <p> BRI 483984938 A/N Rey's Cake </p>
                    </center>

                </div>
            </div>
            <br />


        </div>


        <!-- DATA BOOKING -->
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="float-left"><?= strtoupper($isi2['nama_coklat']); ?></h1>
                    <h3><sup class=""><?= $isi['jumlah']; ?>/ Pcs</sup></h3>
                    <table class="table table-info table-striped">
                        <!-- menampilkan data kode booking dari tabel booking -->
                        <tr>
                            <td>Kode Pesanan </td>
                            <td> :</td>
                            <td><?php echo $isi['kode_booking']; ?></td>
                        </tr>
                        <!-- menampilkan nama booking dari tabel booking -->
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td> :</td>
                            <td><?php echo $isi['nama']; ?></td>
                        </tr>

                        <!-- menampilkan no telpon dari tabel booking -->
                        <tr>
                            <td>telepon </td>
                            <td> :</td>
                            <td><?php echo $isi['no_tlp']; ?></td>
                        </tr>


                        <!-- menampilkan status booking dari tabel booking -->
                        <tr>
                            <td>Status </td>
                            <td> :</td>
                            <td><?= $isi['konfirmasi_pembayaran']; ?></td>
                        </tr>
                    </table>
                    <h3 class="float-left">Rp. <?php echo number_format($isi['total_harga']); ?></h3>
                    <!-- jika status belum bayar maka akan tampil tombol konfirmasi pembayaran-->
                    <?php if ($isi['konfirmasi_pembayaran'] == 'belum bayar') { ?>
                        <a class="btn btn-primary float-right text-light" href="konfirmasi.php?id=<?= $isi['kode_booking']; ?>">Konfirmasi Pembayaran</a>
                    <?php } else { ?>
                        <a href="index.php" class="btn btn-success float-right">Kembali</a>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>






<?php
// memanggil file footer.php
include 'footer.php';

?>