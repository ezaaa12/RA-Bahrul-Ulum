   <!-- Fasilitas Sekolah -->

   <section class="popular-location galerikegiatan">
      <div class="row galeribu center">
         <span class="teal-text">Sarana dan Fasilitas</span>
         <h4>Fasilitas Sekolah</h4>
      </div>

      <div class="container" style="width:80%">
         <div class="row box">
            <div class="col s12 m12">
               <div class="wrapper">
                  <div class="gallery">
                     <?php foreach ($fasilitas as $fs) : ?>
                        <div class="image"><span><img src="<?= base_url('assets/img/info/fasilitassekolah/') . $fs['gambar']; ?>"></span></div>
                     <?php endforeach; ?>
                  </div>
               </div>
               <div class="shadow"></div>
               <div class="pagination justify-content-center" style="padding: 20px;">
                  <div class="row">
                     <div class="col-s12">
                        <?= $this->pagination->create_links(); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </section> <!-- End -->