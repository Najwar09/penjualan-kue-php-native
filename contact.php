<?php 
include 'header.php';
 ?>


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
    <!-- end contact section -->

<?php 
  include 'footer.php';
 ?>