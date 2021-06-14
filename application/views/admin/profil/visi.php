<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="row">
      <div class="col-lg-8">
         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>

         <?= $this->session->flashdata('message'); ?>
         <table class="table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Visi Sekolah</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($visi as $v) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $v['visi']; ?></td>
                     <td>
                        <a href=" <?= base_url('adminprofil/ubahvisi/') . $v['id']; ?>" class=" badge badge-success">ubah</a>
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