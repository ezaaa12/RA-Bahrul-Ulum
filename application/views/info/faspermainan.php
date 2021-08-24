<!-- Fasilitas -->
   <div class="contaiter teal accent-4 fasilitas">
      <h3 class=" white-text center">Sarana & Fasilitas</h3>
   </div>

      <div class="container kolam">
         <h5 class="center">Fasilitas Permainan</h5>
         <!-- Swiper -->
         <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
               <?php foreach ($permainan as $p) : ?>
                  <div class="swiper-slide">
                     <img src="<?= base_url('assets/img/info/fasilitaspermainan/') . $p['gambar']; ?>" />
                  </div>
               <?php endforeach; ?>
            </div>
            <div class="swiper-pagination pagi2"></div>
         </div>
      </div>
   </section>
   <!-- End -->
