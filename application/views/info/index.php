   <!-- Info Kelas -->
   <section>
      <div class="container infokelas">
         <h4 class="center teal-text">Info Kelas</h4>
         <h5 class="center">RA BAHRUL ULUM</h5>
         <hr>
         <div class="row">
            <?php foreach ($kelas as $k) : ?>
               <div class="col-lg-6">
                  <div class="card small">
                     <div class="card-image">
                        <img src="<?= base_url('assets/img/info/kelas/') . $k['gambar']; ?>">
                     </div>
                     <div class="card-content">
                        <h5 class="teal-text"><?= $k['kelas']; ?></h5>
                        <p><?= $k['keterangan']; ?></p>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </section>

   <!-- Kegiatan Sekolah -->
   <section class="grey lighten-3 keg">
      <div class="container kegiatan">
         <h4 class="center teal-text">Kegiatan Sekolah</h4>
         <h5 class="center">Kegiatan Sekolah RA BAHRUL ULUM</h5>
         <hr>
         <div class="row center">
            <?php foreach ($kegiatan as $kg) : ?>
               <div class="col-sm-3 center">
                  <div class="card-panel white">
                     <span class="grey-text text-lighten-2"> <img src="<?= base_url('assets/img/info/kegiatan/') . $kg['gambar']; ?>">
                     </span>
                     <h5 class="teal-text"><?= $kg['kegiatan']; ?></h5>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </section>

   <!-- End -->

   <!-- Kurikulum -->
   <div class="parallax-container kurikulum">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 200">
         <path fill="#eeeeee" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,128C672,128,768,160,864,149.3C960,139,1056,85,1152,64C1248,43,1344,53,1392,58.7L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
      </svg>
      <div class="parallax"><img src="<?= base_url('assets/img/info/kurikulum/child.jpg') ?>"></div>

      <div class="container judul">
         <div class="row">
            <div class="col m12 s12 center">
               <h3 class="center white-text">Kurikulum</h3>
               <div class="card-panel blue lighten-5 kotak">
                  <img src="<?= base_url('assets/img/info/kurikulum/study.png') ?>" class="responsive-img icon">
                  <h5>
                     <?php foreach ($kurikulum as $k) : ?>
                        <p>"<?= $k['kurikulum']; ?>"</p>
                     <?php endforeach; ?>
                  </h5>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end -->

   <!-- Fasilitas -->
   <div class="contaiter teal accent-4 fasilitas">
      <h3 class=" white-text center">Sarana & Fasilitas</h3>
   </div>

    <!-- Galeri Kegiatan -->
    <div class="popular-location galerikegiatan ">
        <div class="row galeribu center">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single-location mb-30">
                        <div class="location-img">
                            <img src="<?= base_url('assets/img/galeri/internal/mewarnai3.png'); ?>" alt="">
                        </div>
                        <div class="location-details">
                            <p>Fasilitas Sekolah</p>
                            <a href="<?= base_url('subindex') ?>" class="location-btn teal white-text">Detail Kegiatan</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single-location mb-30">
                        <div class="location-img">
                            <img src="<?= base_url('assets/img/galeri/eksternal/psa1.png') ?>">
                        </div>
                        <div class="location-details">
                            <p>Fasilitas Permainan</p>
                            <a href="<?= base_url('faspermainan') ?>" class="location-btn teal white-text">Detail Kegiatan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

   <!-- Prestasi -->
   <div class="contaiter teal accent-4 fasilitas">
      <h3 class=" white-text center">Prestasi</h3>
   </div>

   <section class="fres">
      <div class="container prestasi ">
         <div class="row">
            <div class="col-lg m6 kiri">
               <img src="<?= base_url('assets/img/info/prestasi/kids.jpg'); ?>" class="responsive-img">
            </div>
            <div class="col m6 s6 kanan">
               <h4>Prestasi RA Bahrul Ulum</h4>
               <ol>
                  <?php foreach ($prestasi as $ps) : ?>
                     <li><?= $ps['prestasi']; ?></li>
                  <?php endforeach; ?>
               </ol>
            </div>
         </div>
      </div>
   </section>


   <!-- End -->