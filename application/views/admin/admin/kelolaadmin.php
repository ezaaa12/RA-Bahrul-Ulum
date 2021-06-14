<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="row">
      <div class="col-lg">

         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>

         <?= $this->session->flashdata('message'); ?>

         <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newAdminModal" style="background-color: #00bfa5; color:white;">Tambah Admin</a>

         <table class=" table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($admin as $am) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $am['nama']; ?></td>
                     <td><?= $am['email']; ?></td>
                     <td><?= $am['password']; ?></td>
                     <td>
                        <a href="<?= base_url('adminkelola/ubahadmin/') . $am['id']; ?>" class=" badge badge-success">ubah</a>
                        <a href="<?= base_url('adminkelola/hapusadmin/') . $am['id']; ?>" class=" badge badge-danger" onclick="return confirm('hapus?')">hapus</a>
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

<!-- Modal -->
<div class=" modal fade" id="newAdminModal" tabindex="-1" aria-labelledby="newAdminModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newAdminModal">Tambah Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('adminkelola/kelolaadmin'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Alamat Email">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
               <button type="submit" class="btn btn-gradient" style="background-color: #00bfa5; color:white;">Tambah</button>
            </div>
         </form>
      </div>
   </div>
</div>