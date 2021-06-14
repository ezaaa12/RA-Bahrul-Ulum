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
                  <th scope="col">Isi Sambutan</th>
                  <th scope="col">Jabatan</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($sambutan as $sm) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $sm['isi']; ?></td>
                     <td><?= $sm['jabatan']; ?></td>
                     <td><?= $sm['nama']; ?></td>
                     <td>
                        <a href=" <?= base_url('adminhome/ubahsambutan/') . $sm['id']; ?>" class=" badge badge-success">ubah</a>
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