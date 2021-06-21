<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newVideoModal" style="background-color:#00bfa5; color:white;">Tambah video pembelajaran</a>

   <div class="row">
      <div class="col-lg">

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
                  <th scope="col">Judul</th>
                  <th scope="col">Link</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($video as $v) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $v['tittle']; ?></td>
                     <td><?= $v['link']; ?></td>
                     <td>
                        <a href=" <?= base_url('adminvideo/ubahvideo/') . $v['id']; ?>" class=" badge badge-success">ubah</a>
                        <a href="<?= base_url('adminvideo/hapusvideo/') . $v['id']; ?>" class=" badge badge-danger" onclick="return confirm('hapus?')">hapus</a>
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
<div class=" modal fade" id="newVideoModal" tabindex="-1" aria-labelledby="newVideoModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newVideoModalLabel">Tambah video pembelajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('adminvideo/index'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Tuliskan judul untuk video">
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" id="link" name="link" placeholder="Masukan link video">
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