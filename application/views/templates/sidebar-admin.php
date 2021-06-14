<!-- Sidebar -->
<ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1eae98;">

   <!-- Sidebar - Logo Sekolah dan Nama Sekolah -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home') ?>">
      <div class="sidebar-brand-icon">
         <img src="<?= base_url('assets/img/Logo.png'); ?>" style="width: 85px;">
      </div>
      <div class="sidebar-brand-text">RA Bahrul Ulum</div>
   </a>


   <!-- Garis -->
   <hr class="sidebar-divider">
   <!-- Query Menu -->
   <?php
   $queryMenu = "SELECT *
               FROM `table_menu`
               ORDER BY `table_menu`.`id` ASC";
   $menu = $this->db->query($queryMenu)->result_array();
   ?>

   <!-- Looping Menu -->
   <?php foreach ($menu as $m) : ?>
      <!-- Judul -->
      <div class="sidebar-heading">
         <?= $m['menu']; ?>
      </div>


      <!-- submenu sesuai menu -->
      <?php
      $menuId = $m['id'];
      $querySubMenu = "SELECT * 
               FROM `table_submenu` JOIN `table_menu` 
               ON `table_submenu`.`menu_id` = `table_menu`.`id`
               WHERE `table_submenu`.`menu_id` = $menuId
            ";

      $subMenu = $this->db->query($querySubMenu)->result_array();
      ?>

      <?php foreach ($subMenu as $sm) : ?>
         <?php if ($title == $sm['title']) : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
               <i class="<?= $sm['icon']; ?>"></i>
               <span><?= $sm['title']; ?></span></a>
            </li>
         <?php endforeach; ?>
         <!-- garis -->
         <hr class="sidebar-divider mt-3">
      <?php endforeach; ?>

      <!-- Logout -->
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