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

   <!-- SwiperJS -->
   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

   <!-- MY CSS -->
   <link rel="stylesheet" href="<?= base_url("assets/CSS/Style.css"); ?>">

   

   <title><?= $judul; ?></title>
</head>

<body>
   <!-- navbar -->
      <div class="navbar-fixed ">
         <nav class="teal accent-4">
            <div class="container">
               <div class="row">
                  <div class="col m12 s12">
                     <div class="nav-wrapper">
                     <a href="<?= base_url('home'); ?>" class="brand-logo">
               <img src="<?= base_url('assets/img/Logo.png'); ?>" class="navbar">
            </a>
            <span class="judulnav center">RA Bahrul Ulum</span>

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
               </div>
            </div>
         </nav>
      </div>

   <!-- sidenav -->
   <ul class="sidenav" id="mobile-nav">
      <li><a href="<?= base_url('home'); ?>">Home</a></li>
      <li><a href="<?= base_url('profile'); ?>">Profil</a></li>
      <li><a href="<?= base_url('info'); ?>">Info</a></li>
      <li><a href="<?= base_url('vpembelajaran'); ?>">Video Pembelajaran</a></li>
      <li><a href="<?= base_url('galeri'); ?>">Galeri</a></li>
   </ul>