<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newTujuanModal" style="background-color:#00bfa5; color:white;">Tambah data tujuan</a>

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
                  <th scope="col">Tujuan Sekolah</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($tujuan as $t) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $t['tujuan']; ?></td>
                     <td>
                        <a href=" <?= base_url('adminprofil/ubahtujuan/') . $t['id']; ?>" class=" badge badge-success">ubah</a>
                        <a href="<?= base_url('adminprofil/hapustujuan/') . $t['id']; ?>" class=" badge badge-danger" onclick="return confirm('hapus?')">hapus</a>
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
<div class=" modal fade" id="newTujuanModal" tabindex="-1" aria-labelledby="newTujuanModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newTujuanModalLabel">Tambah data tujuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('adminprofil/tujuan'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tuliskan tujuan yang akan di tambahkan">
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