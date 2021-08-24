<!-- Fasilitas -->
   <div class="contaiter teal accent-4 fasilitas">
      <h3 class=" white-text center">Sarana & Fasilitas</h3>
   </div>

   <section class="fass">
      <div class="container kolam">
         <h5 class="center">Fasilitas Sekolah</h5>
         <!-- Swiper -->
         <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
               <?php foreach ($fasilitas as $f) : ?>
                  <div class="swiper-slide">
                     <img src="<?= base_url('assets/img/info/fasilitassekolah/') . $f['gambar']; ?>" />
                  </div>
               <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
         </div>
      </div>
   </section>
   <!-- End -->
