<?php 
include 'koneksi.php';
include 'header.php';

if (empty($_SESSION['user'])) {
    echo '<script>alert("Harap login !");window.location="index.php"</script>';
  }

$kode_booking = $_GET['id'];
$query = "SELECT * FROM booking WHERE kode_booking = '$kode_booking'";
$hasil = mysqli_query($connection,$query);
$isi = mysqli_fetch_assoc($hasil);


 ?>

 <div class="container">
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <!-- menampilkan informasi tentang nomor rekening toko kue -->
            <div class="card-body" style="height: 310px; background-color: lightgray;">
                <center><h3>Pembayaran Dapat Melalui :</h3>
                <hr/>
                <p> BRI 483984938 A/N Rey's Cake </p></center>

        </div>
        </div>
    </div>
    <div class="col-sm-8">
         <div class="card">
           <div class="card-body">

           <!-- FORM NO REKENING DAN TOTAL TRANSFER PENYEWA -->
               <form method="post" action="proses.php?id=konfirmasi" enctype="multipart/form-data">
                    <table class="table">
                        <!-- menampilkan total pembayaran dari tabel booking -->
                        <tr>
                            <td><h4>Total yg Harus di Bayar </h4></td>
                            <td><h4> :</h4></td>
                            <td><h4>Rp. <?php echo number_format(
                                $isi['total_harga']
                            ); ?></h4></td>
                        </tr>
                        <tr>
                        	<td>Masukkan Bukti Pembayaran</td>
                        	<td>:</td>
                        	<td><input type="file" name="bukti" required accept="image/*"></td>

                        </tr>
                    </table>
                    <input type="hidden" name="id_booking" value="<?= $isi['id_booking']; ?>">
                    <button type="submit" class="btn btn-primary float-right">Kirim</button>
               </form>
           </div>
         </div> 
    </div>
</div>
</div>


<?php 
include 'footer.php';
 ?>