<?php
// memanggil file koneksi.php
include '../../koneksi.php';
// membuat varibel $title_web dengan nilai konfirmasi
include '../header2.php';

$id = $_GET['id'];
$query = "SELECT * FROM booking WHERE id_booking='$id'";
$hasil = mysqli_query($connection, $query);
$isi = mysqli_fetch_assoc($hasil);


?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5> Detail Pembayaran</h5>
                </div>
                <div class="card-body">
                    <!-- tabel untuk menampilkan data detail pembayaran -->
                    <table class="table">
                        <tr>
                            <td><img src="../../images/<?= $isi['bukti']; ?>" alt="" height="300px"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br />

        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h5> Detail booking</h5>
                </div>
                <div class="card-body">


                    <!-- form untuk menampilkan data detail booking -->
                    <form method="post" action="proses.php?aksi=konfirmasi&id=<?php echo $isi['id_booking']; ?>">
                        <table class="table">
                            <tr>
                                <td>Kode Booking </td>
                                <td> :</td>
                                <td><?php echo $isi['kode_booking']; ?></td>
                            </tr>

                            <tr>
                                <td>Nama </td>
                                <td> :</td>
                                <td><?php echo $isi['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat </td>
                                <td> :</td>
                                <td><?php echo $isi['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>telepon </td>
                                <td> :</td>
                                <td><?php echo $isi['no_tlp']; ?></td>
                            </tr>

                            <tr>
                                <td>Total Harga </td>
                                <td> :</td>
                                <td>Rp. <?php echo number_format($isi['total_harga']); ?></td>
                            </tr>
                            <tr>
                                <td>Status </td>
                                <td> :</td>
                                <td>
                                    <select class="form-control" name="status">

                                        <option <?php if ($isi['konfirmasi_pembayaran'] == 'sedang di proses') {
                                                    echo 'selected';
                                                } ?>>
                                            Sedang di proses
                                        </option>
                                        <option <?php if ($isi['konfirmasi_pembayaran'] == 'pembayaran di terima') {
                                                    echo 'selected';
                                                } ?>>
                                            Pembayaran di terima
                                        </option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="id_booking" value="<?php echo $isi['id_booking']; ?>">
                        <!-- menampilkan tombol ubah status -->
                        <button type="submit" class="btn btn-primary float-right">
                            Ubah Status
                        </button>
                    </form>
                    <br><br><br>

                    <table class="table">
                        <thead>
                            <tr class="bg-dark text-light">
                                <th scope="col">No</th>
                                <th scope="col">Nama Kue</th>
                                <th scope="col">jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor=1;
                            $kode_booking = $_GET['kode'];
                            $query = "SELECT * FROM keranjang WHERE id_booking = '$kode_booking'";
                            $hasil = mysqli_query($connection,$query);
                            foreach ($hasil as $isi) {
                            ?>
                            <tr>
                                <th scope="row"><?= $nomor; ?></th>
                                <td ><?= $isi['nama']; ?></td>
                                <td ><?= $isi['jumlah']; ?></td>
                            </tr>
                            <?php $nomor++; } ?>
                        </tbody>
                    </table>
                    <a href="transaksi.php" class="btn btn-success">Kembali</a>

                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<!-- memanggil file footer.php -->
<?php include '../footer2.php'; ?>