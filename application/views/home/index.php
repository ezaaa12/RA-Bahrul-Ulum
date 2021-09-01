<!-- Slide Gambar -->
<div class="slider">
   <ul class="slides">
      <li>
         <img src="<?= base_url('assets/img/menu/slider/1aja.png'); ?>">
         <div class="caption left-align">
            <h3>RA BAHRUL ULUM</h3>
            <h5 class="light grey-text text-lighten-3">Generasi Berilmu</h5>
         </div>
      </li>
      <li>
         <img src="<?= base_url('assets/img/menu/slider/2aja.jpg'); ?>">
         <div class="caption center-align">
            <h3>RA BAHRUL ULUM</h3>
            <h5 class="light grey-text text-lighten-3">Generasi Soleh Solehah</h5>
         </div>
      </li>
      <li>
         <img src="<?= base_url('assets/img/menu/slider/3aja.png'); ?>">
         <div class="caption right-align">
            <h3>RA BAHRUL ULUM</h3>
            <h5 class="light grey-text text-lighten-3">Generasi Berketerampilan</h5>
         </div>
      </li>
   </ul>
</div>


<!-- Foto Kegiatan -->
<section id="kegiatan" name="kegiatan">
   <div class="container">
      <div class="judul">
         <h4 class="center teal-text">Kegiatan Sekolah</h4>
         <h5>Kegiatan-kegiatan Sekolah RA Bahrul Ulum</h5>
         <hr>
      </div>
      <!-- Baris kesatu -->
      <div class="row">
         <?php foreach ($kegiatan as $kg) : ?>
            <div class="col-md-4">
               <div class="card1">
                  <img src="<?= base_url('assets/img/menu/kegiatan/') . $kg['gambar']; ?>" class="card-img-top">
                  <div class="card-body">
                     <h5 class="card-title"><?= $kg['kegiatan']; ?></h5>
                     <p class="card-text"><?= $kg['tanggal']; ?></p>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</section>

<!-- Sambutan KEPSEK -->
<div class="parallax-container">
   <div class="parallax"><img src="<?= base_url('assets/img/menu/parallaxx.jpg'); ?>">
   </div>

   <div class="container-sambutan">
      <h3 class="center teal-text">Sambutan Kepala Sekolah</h3>
      <div class="row">
         <div class="col m12 s12">
            <div class="container center">
               <div class="card">
                  <div class="card-body">
                     <?php foreach ($sambutan as $sm) : ?>
                        <p class="smb"><?= $sm['isi']; ?></p>
                        <p class="sekolah"><?= $sm['jabatan']; ?></p>
                        <p class="kepsek"><?= $sm['nama']; ?></p>
                     <?php endforeach; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>


<!-- Galeri Random -->
<section id="galeri" class="galeri">
   <div class="contaiter teal accent-4 gl">
      <h3 class="light white-text center">Galeri Kegiatan</h3>
   </div>
   <div class="container">
      <div class="row">
         <?php foreach ($gambar as $g) : ?>
            <div class="col-6 col-md-3">
               <img src="<?= base_url('assets/img/menu/galeri/') . $g['gambar']; ?>" class="responsive-img materialboxed" style="margin-top: 20px;">
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</section>