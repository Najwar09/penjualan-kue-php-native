<?php
include '../header2.php';
include '../../koneksi.php';

$tanggalAwal = $_GET['tgla'];
$tanggalAkhir = $_GET['tglb'];

$query = "SELECT * FROM booking WHERE tanggal BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY tanggal DESC";
$hasil = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.css">

</head>

<body>
    <br>
    <br>
    <center>
        <h2>LAPORAN TRANSAKSI</h2>
    </center>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>kode booking</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>no telpon</th>
                <th>total harga</th>
                <th>tanggal transaksi</th>
                <th>konfirmasi pembayaran</th>
                <th>bukti pembayaran</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($hasil as $isi) { ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $isi['kode_booking']; ?></td>
                    <td><?= $isi['nama']; ?></td>
                    <td><?= $isi['alamat']; ?></td>
                    <td><?= $isi['no_tlp']; ?></td>
                    <td>Rp. <?= number_format($isi['total_harga']); ?></td>
                    <td><?= $isi['tanggal']; ?></td>
                    <td><?= $isi['konfirmasi_pembayaran']; ?></td>
                    <td><img src="../../images/<?= $isi['bukti']; ?>" width="100px"></td>
                    <td><input type="text" value="<?= $tanggalAwal; ?>" hidden></td>
                </tr>
            <?php $no++;
        } ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
<br>
<br>
<br>
<br>
<br>