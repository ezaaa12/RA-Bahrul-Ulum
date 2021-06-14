<!-- Sejarah Sekolah -->
<section id="sejarah" class="sejarah">
   <div class="container">
      <div class="judul-sejarah">
         <h4 class="center teal-text judul">Profil Sekolah</h4>
         <h5 class="center judul">RA Bahrul Ulum</h5>
         <hr>
      </div>
      <div class="content">
         <?php foreach ($profil as $p) : ?>
            <p><?= $p['profil']; ?></p>
         <?php endforeach; ?>
      </div>
   </div>
</section>


<!-- Visi Misi -->
<div class="parallax-container">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 150">
      <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,128C672,128,768,160,864,149.3C960,139,1056,85,1152,64C1248,43,1344,53,1392,58.7L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
   </svg>
   <div class="parallax responsive-img"><img src="<?= base_url('assets/img/profile/vimi.jpg'); ?>">
   </div>

   <div class="container-sambutan">
      <h3 class="center teal-text titlee">Visi Misi RA Bahrul Ulum</h3>
   </div>

   <div class="row">
      <div class="col-lg-12">
         <div class="container">
            <div class="card">
               <div class="card-body">

                  <div class="visi center">
                     <p class="jdl">Visi</p>
                     <?php foreach ($visi as $v) : ?>
                        <p>"<?= $v['visi']; ?>"</p>
                     <?php endforeach; ?>
                  </div>

                  <div class="misi center">
                     <p class="jdl">Misi</p>
                     <ul>
                        <?php foreach ($misi as $m) : ?>
                           <li>"<?= $m['misi']; ?>"</li>
                        <?php endforeach; ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<!-- Tujuan -->
<section id="tjn" class="tjn grey lighten-3 keg">
   <div class="contaiter teal accent-4 ktujuan">
      <h3 class=" white-text center">Tujuan Sekolah</h3>
   </div>

   <div class="container">
      <div class="row tujuan">
         <div class="col-lg-6">
            <img src="<?= base_url('assets/img/profile/tujuan.png'); ?>" class="img-fluid">
         </div>

         <div class="col-lg-6">
            <h4>Tujuan Sekolah RA Bahrul Ulum</h4>
            <ol>
               <?php foreach ($tujuan as $t) : ?>
                  <li><?= $t['tujuan']; ?></li>
               <?php endforeach; ?>
            </ol>
         </div>
      </div>
   </div>
</section>

<!-- Profil Guru2 -->
<section id="bioguru" class="bioguru">
   <div class="judulguru">
      <h4 class="center teal-text">Guru & Staff</h4>
      <h5>Guru-guru Sekolah RA Bahrul Ulum</h5>
      <hr>
   </div>
   <div class="container">
      <div class="row biodata-guru">
         <?php foreach ($dataguru as $dg) : ?>
            <div class="col-sm-4 center guru">
               <img src="<?= base_url('assets/img/profile/guru/') ?><?= $dg['gambar']; ?>" width="120" class="rounded-circle">
               <h6><?= $dg['nama']; ?></h6>
               <p><?= $dg['jabatan']; ?></p>
            </div>
         <?php endforeach; ?>

      </div>
   </div>


</section>