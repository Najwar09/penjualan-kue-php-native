<?php
include '../header2.php';
include '../../koneksi.php';

$query = "SELECT * FROM booking ORDER BY id_booking DESC";
$hasil = mysqli_query($connection, $query);
?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php
    include '../sidebar2.php';
    ?>



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

            <!-- navbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <h5><?= $_SESSION['user']['username']; ?></h5>
                            </span>
                            <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="../profil.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- bagian akhir navbar -->

            <!-- tabel -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Data User / Data Pelanggan</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Semua Data</h6>
                    </div>

                    <!-- inputan tanggal -->
                    <div class="">
                        <form class="form-inline" method="post" action="filter.php">
                            <input class="form-control mr-sm-2" type="date" name="tanggal_awal" placeholder="Cari Nama Transaksi" aria-label="Search">
                            <input class="form-control mr-sm-2" type="date" name="tanggal_akhir" placeholder="Cari Nama Transaksi" aria-label="Search">
                            <button class="btn my-2 my-sm-0 text-light bg-success" type="submit">Search</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($hasil as $isi) {
                                    ?>
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
                                            <td><a href="rincian.php?id=<?= $isi['id_booking']; ?>&kode=<?= $isi['kode_booking']; ?>" class="btn btn-success">Rincian</a></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- akhir tabel -->



        </div>
        <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->





<?php
include '../footer2.php';
?>