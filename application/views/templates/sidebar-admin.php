<!-- Sidebar -->
<ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1eae98;">

   <!-- Sidebar - Logo Sekolah dan Nama Sekolah -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home') ?>">
      <div class="sidebar-brand-icon">
         <img src="<?= base_url('assets/img/Logo.png'); ?>" style="width: 85px;">
      </div>
      <div class="sidebar-brand-text">RA Bahrul Ulum</div>
   </a>

   <!-- Dashboard -->
   <hr class="sidebar-divider">
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin') ?>">
         <i class="fas fa-fw fa-tachometer-alt"></i>
         <span>Dashboard</span></a>
   </li>



   <hr class="sidebar-divider">

   <!-- Query Submenu2 -->
   <?php
   $querysubmneu = "SELECT *
               FROM `table_submenu`
               ORDER BY `table_submenu`.`id` ASC";
   $submenu = $this->db->query($querysubmneu)->result_array();
   ?>

   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
         <i class="fas fa-fw fa-folder"></i>
         <span>Management Menu</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <?php foreach ($submenu as $sm) : ?>
               <a class="collapse-item" href="<?= base_url($sm['url']); ?>"><?= $sm['keterangan']; ?></a>
            <?php endforeach; ?>
         </div>
      </div>
   </li>

   <!-- Query Submenu1 -->
   <?php
   $querysubmneu1 = "SELECT *
               FROM `table_submenu1`
               ORDER BY `table_submenu1`.`id` ASC";
   $submenu1 = $this->db->query($querysubmneu1)->result_array();
   ?>

   <!-- Submenu1 -->

   <?php foreach ($submenu1 as $sm1) : ?>
      <hr class="sidebar-divider">
      <li class="nav-item">
         <a class="nav-link" href="<?= base_url($sm1['url']); ?>">
            <i class=" <?= $sm1['ikon']; ?>"></i>
            <span><?= $sm1['keterangan']; ?></span></a>
      </li>
   <?php endforeach; ?>


   <!-- Logout -->
   <hr class="sidebar-divider">
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url('login/logout'); ?>">
         <i class="fas fa-fw fa-sign-out-alt"></i>
         <span>Logout</span></a>
   </li>
   <!-- garis -->
   <hr class="sidebar-divider d-none d-md-block">


   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

</ul>
<!-- End of Sidebar -->