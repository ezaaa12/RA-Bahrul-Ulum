<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newMisiModal" style="background-color:#00bfa5; color:white;">Tambah Misi</a>

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
                  <th scope="col">Misi Sekolah</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($misi as $m) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $m['misi']; ?></td>
                     <td>
                        <a href=" <?= base_url('adminprofil/ubahmisi/') . $m['id']; ?>" class=" badge badge-success">ubah</a>
                        <a href="<?= base_url('adminprofil/hapusmisi/') . $m['id']; ?>" class=" badge badge-danger" onclick="return confirm('hapus?')">hapus</a>
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
<div class=" modal fade" id="newMisiModal" tabindex="-1" aria-labelledby="newMisiModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newMisiModalLabel">Tambah Misi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('adminprofil/misi'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="misi" name="misi" placeholder="Tuliskan misi yang akan di tambahkan">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
               <button type="submit" class="btn btn-gradient" style="background-color:#00bfa5; color:white;">Tambah</button>
            </div>
         </form>
      </div>
   </div>
</div>