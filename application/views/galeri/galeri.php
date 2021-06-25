<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- font google -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&family=Poppins:wght@300;400&family=Sulphur+Point:wght@300;400;700&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto:wght@100;400;500&family=Ubuntu:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Fredoka+One&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

   <!-- Materialize -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   <!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


   <!-- MY CSS -->
   <link rel="stylesheet" href="<?= base_url('assets/CSS/galeri.css'); ?>">
   <link rel="stylesheet" href="<?= base_url("assets/CSS/Style.css"); ?>">

   <!-- Citylink Css -->
   <link rel="stylesheet" href="<?= base_url('assets/CSS/city.css'); ?>">

    <!-- lightbox -->
    <link rel="stylesheet" href="<?= base_url('assets/CSS/cn.css'); ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>



   <title><?= $judul; ?></title>
</head>

<body>
   <!-- navbar -->
   <nav class="teal accent-4">
      <div class="container">
         <div class="nav-wrapper">
            <a href="<?= base_url('home'); ?>" class="brand-logo">
               <img src="<?= base_url('assets/img/Logo.png'); ?>" class="navbar">
            </a>
            <span class="judulnav center">RA Bahrul Ulum</span>
            <!-- <span class="center">RA Bahrul Ulum </span> -->
            <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="fitur right hide-on-med-and-down">
               <li><a href="<?= base_url('home'); ?>">Home</a></li>
               <li><a href="<?= base_url('profile'); ?>">Profil</a></li>
               <li><a href="<?= base_url('info'); ?>">Info</a></li>
               <li><a href="<?= base_url('vpembelajaran'); ?>">Video Pembelajaran</a></li>
               <li><a href="<?= base_url('galeri'); ?>">Galeri</a></li>
            </ul>
         </div>
      </div>
   </nav>

   <!-- sidenav -->
   <ul class="sidenav" id="mobile-nav">
      <li><a href="<?= base_url('home'); ?>">Home</a></li>
      <li><a href="<?= base_url('profile'); ?>">Profil</a></li>
      <li><a href="<?= base_url('info'); ?>">Info</a></li>
      <li><a href="<?= base_url('vpembelajaran'); ?>">Video Pembelajaran</a></li>
      <li><a href="<?= base_url('galeri'); ?>">Galeri</a></li>
   </ul>

   <!-- Galeri Kegiatan -->

   
   <div class="popular-location galerikegiatan ">
       <div class="row galeribu center">
                    <span class="teal-text">Galeri</span>
                   <h2>RA Bahrul Ulum</h2>
       </div>

       <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single-location mb-30">
                        <div class="location-img">
                            <img src="<?= base_url('assets/img/galeri/duha1.png') ?>" alt="">
                        </div>
                        <div class="location-details">
                            <p>Sholat Duha Bersama</p>
                            <a href="<?= base_url('galeri/kegduha') ?>" class="location-btn teal white-text">Detail Kegiatan</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single-location mb-30">
                        <div class="location-img">
                            <img src="<?= base_url('assets/img/galeri/manasik1.jpg') ?>" alt="">
                        </div>
                        <div class="location-details">
                            <p>Manasik Haji</p>
                            <a href="<?= base_url('galeri/kegmanasik') ?>" class="location-btn teal white-text">Detail Kegiatan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</div>


   <!-- End -->

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

      const materialbox = document.querySelectorAll('.materialboxed');
      M.Materialbox.init(materialbox);
   </script>

 


</body>

</html>