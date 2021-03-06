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
         $vid = explode('=', $v['link']);

         $thum = $vid[1];

         ?>
         <div class="col-lg-6">
            <div class="card">
               <div class="card-image">
                  <div class="video-container">
                     <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $thum; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
               </div>
               <div class="card-content">
                  <h5><?= $v['tittle']; ?></h5>
               </div>
               <div class="card-action">
                  <a href="<?= $v['link']; ?>" class="waves-effect waves-light btn teal" target="_blank">Lihat Di YouTube</a>
               </div>
            </div>
         </div>
      <?php endforeach; ?>
   </div>
</div>
<!-- End -->

<!-- Pagination -->
<div class="container">
   <ul class="pagination">
      <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
      <li class="active"><a href="#!">1</a></li>
      <li class="waves-effect"><a href="#!">2</a></li>
      <li class="waves-effect"><a href="#!">3</a></li>
      <li class="waves-effect"><a href="#!">4</a></li>
      <li class="waves-effect"><a href="#!">5</a></li>
      <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
   </ul>
</div>   
<!-- Akhir Pagination -->