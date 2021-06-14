<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
         <?= validation_errors(); ?>
      </div>
   <?php endif; ?>

   <?= $this->session->flashdata('message'); ?>
   <div class="row">

      <div class="col-lg">
         <table class="table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Profil</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($profil as $p) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $p['profil']; ?></td>
                     <td>
                        <a href=" <?= base_url('adminprofil/ubahprofil/') . $p['id']; ?>" class=" badge badge-success">ubah</a>
                     </td>
                  </tr>
                  <?php $i++; ?>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->