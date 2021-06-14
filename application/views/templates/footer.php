  <!-- footer -->
  <footer class="teal accent-4">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 230">
          <path fill="#ffffff" fill-opacity="1" d="M0,128L48,106.7C96,85,192,43,288,69.3C384,96,480,192,576,197.3C672,203,768,117,864,96C960,75,1056,117,1152,117.3C1248,117,1344,75,1392,53.3L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
          </path>
      </svg>
      <div class="container content ">
          <div class="row">
              <div class="col-md-4">
                  <h5 class="white-text">Alamat RA Bahrul Ulum</h5>
                  <p class="grey-text text-lighten-4" style="text-align:left;">Jl. Layungsari III Sirnasari RT 01 RW 04 Bogor Selatan, Jawa Barat.</p>
              </div>
              <div class="col-md-4">
                  <h5 class="white-text">Hubungi : </h5>
                  <img src="<?= base_url('assets/img/wa_fix.png'); ?>">
                  <span style="color: white;">085925000088</span>
                  </br>
                  <img src="<?= base_url('assets/img/email-fix.png'); ?>">
                  <span style="color: white;">bahrululumra@gmail.com</span>
              </div>
              <div class="col-md-4">
                  <ul>
                      <h5 class="white-text">Menu</h5>
                      <li><a href="<?= base_url('home'); ?>" class="white-text" style="text-decoration: none;">Home</a></li>
                      <li><a href="<?= base_url('profile'); ?>" class="white-text" style="text-decoration: none;">Profil</a></li>
                      <li><a href="<?= base_url('info'); ?>" class="white-text" style="text-decoration: none;">Info</a></li>
                      <li><a href="<?= base_url('vpembelajaran'); ?>" class="white-text" style="text-decoration: none;">Video Pembelajaran</a></li>
                      <a><a href="<?= base_url('galeri'); ?>" class="white-text" style="text-decoration: none;">Galeri</a></a>
                  </ul>
              </div>
          </div>
      </div>
      <div class="footer-copyright">
          <div class="container center textcopy white-text" style="padding: 20px;">
              © 2021 Copyright RA Bahrul Ulum
          </div>
      </div>
  </footer>
  <!-- end -->


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <!-- Swiper Js -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Javascript Materialize -->
  <script>
      //  sidebar
      const sidenav = document.querySelectorAll('.sidenav');
      M.Sidenav.init(sidenav);

      // Slider
      const slider = document.querySelectorAll('.slider');
      M.Slider.init(slider, {
          indicators: false,
          height: 500,
          interval: 3000
      });

      // Sambutan kepsek
      const parallax = document.querySelectorAll('.parallax');
      M.Parallax.init(parallax);

      // Galleri Random
      const materialbox = document.querySelectorAll('.materialboxed');
      M.Materialbox.init(materialbox);

      // kurikulum
      const kurikulum = document.querySelectorAll('.kurikulum');
      M.Kurikulum.init(kurikulum);
  </script>

  <!-- Fasilitas Slider -->
  <script>
      var swiper = new Swiper(".mySwiper", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          coverflowEffect: {
              rotate: 50,
              stretch: 0,
              depth: 100,
              modifier: 1,
              slideShadows: true,
          },
          pagination: {
              el: ".swiper-pagination",
          },
      });
  </script>


  </body>

  </html>