<?php
include '../header2.php';
include '../../koneksi.php';
$query = "SELECT * FROM coklat ORDER BY id_coklat DESC";
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


                <!-- awal navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 "><h5><?= $_SESSION['user']['username']; ?></h5></span>
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

            <!-- awal tabel -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Data Kue</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 float-left">
                        <h6 class="m-0 font-weight-bold text-primary">Semua Data</h6>
                        <a href="tambah.php" class="btn btn-success float-right">Tambah</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Status</th>
                                        <th>Deskripsi</th>
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
                                            <td><img src="../../images/<?= $isi['gambar']; ?>" class="img-fluid" style="width:100px;"></td>
                                            <td><?= $isi['nama_coklat']; ?></td>
                                            <td><?= $isi['harga']; ?></td>
                                            <td><?= $isi['stok']; ?></td>
                                            <td><?= $isi['status']; ?></td>
                                            <td><?= $isi['deskripsi']; ?></td>
                                            <td>
                                                <a href="edit.php?id=<?= $isi['id_coklat'];?>" class="btn btn-warning ">Edit</a>
                                                <a href="proses.php?id=<?= $isi['id_coklat'];?>&aksi=hapus&gambar=<?= $isi['gambar'];?>" class="btn btn-danger ">Hapus</a>
                                            </td>
                                            
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