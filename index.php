<?php
// memanggil file koneksi.php
include 'koneksi.php';

// memanggil file header.php
include 'header.php';

?>
<!-- gambar yang bergerak pada halaman utama -->
<section class="slider_section ">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="detail_box">
                <h1>
                  Chocolate <br>
                  <span>
                    Yummy
                  </span>
                </h1>

              </div>
            </div>
            <div class="col-md-4 ml-auto">
              <div class="img-box">
                <img src="images/slider-img.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="detail_box">
                <h1>
                  Chocolate <br>
                  <span>
                    Yummy
                  </span>
                </h1>

              </div>
            </div>
            <div class="col-md-4 ml-auto">
              <div class="img-box">
                <img src="images/coklat1.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="detail_box">
                <h1>
                  Chocolate <br>
                  <span>
                    Yummy
                  </span>
                </h1>

              </div>
            </div>
            <div class="col-md-4 ml-auto">
              <div class="img-box">
                <img src="images/coklat2.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="carousel_btn-box">
    <!-- tombol arah panah kiri pada gambar bergerak -->
    <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
      <i class="fa fa-arrow-left" aria-hidden="true"></i>
      <span class="sr-only">Previous</span>
    </a>
    <!-- tombol arah panah kanan pada gambar bergerak -->
    <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
      <i class="fa fa-arrow-right" aria-hidden="true"></i>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
<!-- akhir dari gambar yang bergerak pada halaman utama -->
</div>


<!-- tentang toko -->
<section class="about_section layout_padding ">
  <div class="container  ">
    <div class="row">
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              Tentang Toko Coklat Kami
            </h2>
          </div>
          <p>
            Kami dengan bangga mempersembahkan kepada Anda koleksi coklat premium yang lezat dan berkualitas tinggi. Di sini, kami menghormati seni pembuatan coklat dengan menggunakan bahan-bahan pilihan terbaik dan proses produksi yang cermat untuk menciptakan rasa yang luar biasa. Selama bertahun-tahun, Toko Coklat kami telah berkomitmen untuk memberikan pengalaman coklat yang tak terlupakan kepada para pelanggan setia kami.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="img-box">
          <img src="images/about-img.png" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- akhir dari tentang toko -->




<!-- produk coklat -->
<?php
$query = "SELECT * FROM coklat ORDER BY id_coklat DESC";
$hasil = mysqli_query($connection, $query);
?>
<section class="chocolate_section ">
  <div class="container">
    <div class="heading_container">
      <h2>
        Produk Coklat Kami
      </h2>
      <p>
        Produk kami memang lebih mahal dengan toko yang lain tapi dari segi kualitas produk kami bisa di jamin lebih berkualis dari yang lain!
      </p>
    </div>
  </div>
  <div class="container">
    <div class="chocolate_container">
      <?php
      foreach ($hasil as $isi) {
      ?>
        <div class="box">
          <div class="img-box">
            <img src="images/<?= $isi['gambar']; ?>">
          </div>
          <div class="detail-box">
            <h6>
              <?= $isi['nama_coklat'] ?>
            </h6>
            <h6>Sisa
              <?= $isi['stok'] ?> / Pcs
            </h6>
            <h5>Rp.
              <?= number_format($isi['harga']) ?>
            </h5>
            <?php if ($isi['status'] == 'tersedia') { ?>
              <a href="booking.php?id_coklat=<?= $isi['id_coklat'] ?>" class="btn btn-success">Beli</a>
            <?php } else { ?>
              <a href="booking.php?id_coklat=<?= $isi['id_coklat'] ?>" class="btn btn-success" disabled>Beli</a>
            <?php } ?>

            <a href="detail.php?id_coklat=<?= $isi['id_coklat'] ?>" class="btn btn-info">
              Rincian
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<!-- akhir dari produk coklat -->


<!-- kontak kami -->
<section class="contact_section layout_padding">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
        <div class="form_container">
          <div class="heading_container">
            <h2>
              Kontak Kami
            </h2>
          </div>
          <form action="proses.php?id=kontak" method="post">
            <div>
              <input type="text" placeholder="Full Name" name="nama" />
            </div>
            <div>
              <input type="text" placeholder="Phone number" name="telpon" />
            </div>
            <div>
              <input type="email" placeholder="Email" name="email" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" name="pesan" />
            </div>
            <div class="d-flex ">
              <button name="submit" type="submit">
                Kirim
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6  px-0">
        <div class="map_container">
          <div class="map">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- akhir dari kontak kami -->
</div>


<!-- memanggil file footer.php -->
<?php
include 'footer.php';
?>