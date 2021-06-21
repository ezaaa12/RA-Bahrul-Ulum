<!-- Pembelajaran -->
<div class="container center pembelajaran">
   <h3 class="teal-text">Video Pembelajaran</h3>
   <hr class="garis teal">
   <span class="subtext">Berikut Video Pembelajaran untuk Para Murid, agar Selalu Senang dan Ceria dalam Belajar</span>
</div>

<div class="container cardpembelajaran">
   <div class="row">

      <?php foreach ($video as $v) : ?>

         <?php


         $data = $v['link'];

         $thum = explode('=', $data);



         ?>

         <div class="col-lg-4">
            <div class="card" style="width: 19rem;">
               <div class="video-container">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $thum[1] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen preload="metadata"></iframe>
               </div>
               <div class="card-body">
                  <h5 class="card-title judulvideo"><?= $v['tittle']; ?></h5>
                  <a href="<?= $v['link']; ?>" target="_blank" class="btn btn-primary">Lihat di Youtube</a>
               </div>
            </div>
         </div>
      <?php endforeach; ?>
   </div>
</div>


<!-- <div class="col-lg-4">
         <div class="card" style="width: 19rem;">
            <div class="video-container">
               <iframe width="560" height="315" src="https://www.youtube.com/embed/zPnpOVZQDec" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="card-body">
               <h5 class="card-title">Belajar Membaca Iqro Bersama Tayo</h5>
               <p class="card-text">Belajar iqro agar lancar dalam membaca Al-Qur'an</p>
               <a href="https://youtu.be/zPnpOVZQDec" target="_blank" class="btn btn-primary">Lihat Di Youtube</a>
            </div>
         </div>
      </div>
     

<!-- End -->