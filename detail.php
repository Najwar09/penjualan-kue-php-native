<?php 
include 'header.php';
include 'koneksi.php';

$id_coklat = $_GET['id_coklat'];

$query = "SELECT * FROM coklat WHERE id_coklat = '$id_coklat'";
$hasil = mysqli_query($connection,$query);
$isi = mysqli_fetch_assoc($hasil);

 ?>



 <div class="container mt-5">
<div class="row">
    <div class="col-sm-6">
        <!-- menampilkan gambar dari tabel kue -->
        <img class="card-img-top w-100" 
            style="object-fit:cover;" 
            src="images/<?= $isi['gambar'];?>">
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <!-- menampilkan deskripsi kue dari tabel kue -->
                <p class="card-text">
                    Deskripsi :
                    <?= $isi['deskripsi'];?>
                </p>

                <!-- jika status kue tersedia == tersedia maka akan tampil informasi tersedia -->
                <!-- jika status kue habis maka akan tampil informasi habis -->
                <ul class="list-group list-group-flush">
                    <?php if($isi['status'] == 'tersedia'){?>
                    <li class="list-group-item bg-primary text-white">
                        <i class="fa fa-check"></i> Tersedia
                    </li>
                    <?php }else{?>
                    <li class="list-group-item bg-danger text-white">
                        <i class="fa fa-close"></i> Habis
                    </li>
                    <?php }?>

                    <!-- menampilkan stok kue dari tabel kue -->
                    <li class="list-group-item bg-success text-white">
                                <i class="fa fa-check"></i> Sisa 
                                <?= $isi['stok'];?> Pcs
                                
                            </li>
                    <!-- menampilkan harga kue dari tabel kue -->
                    <li class="list-group-item bg-dark text-white">
                        <i class="fa fa-money"></i> Rp. <?=  number_format($isi['harga']);?>/ pcs
                    </li>
                </ul>
                <hr/>
                <!-- tombol booking now dan back -->
                <center>
                    <?php if ($isi['status'] == 'tersedia') {?>
              <a href="booking.php?id_coklat=<?= $isi['id_coklat'] ?>" class="btn btn-success">Beli</a>
            <?php }else{?>
              <button class="btn btn-success"  disabled><a href="booking.php?id_coklat=<?= $isi['id_coklat'] ?>" ></a>beli</button>
            <?php } ?>
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