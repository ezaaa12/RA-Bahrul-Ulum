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
      <div class="col-lg-6">
         <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newKategoriModal" style="background-color:#00bfa5; color:white;">Tambah data kategori</a>

         <table class=" table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kategori Kegiatan</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($kategori as $kt) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $kt['kategori']; ?></td>
                     <td>
                        <a href="<?= base_url('admingaleri/ubahkategori/') . $kt['id']; ?>" class=" badge badge-success">ubah</a>
                        <a href="<?= base_url(); ?>admingaleri/hapuskategori/<?= $kt['id']; ?>" class=" badge badge-danger" onclick="return confirm('hapus?')">hapus</a>
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
<div class=" modal fade" id="newKategoriModal" tabindex="-1" aria-labelledby="newKategoriModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newKategoriModalLabel">Tambah Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('admingaleri/kategori'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori">
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