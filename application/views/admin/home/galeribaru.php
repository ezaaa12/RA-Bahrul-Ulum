<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newgaleriModal" style="background-color:#00bfa5; color:white;">Tambah Gambar</a>

   <div class="row">
      <div class="col-lg">
         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>

         <?= $this->session->flashdata('message'); ?>

         <div class="row">
            <?php $i = 1; ?>
            <?php foreach ($gambar as $g) : ?>
               <div class="col-sm-2">
                  <div class="card" style="width: 10rem; text-align: center; margin-top:20px;">
                     <div class="gambar">
                        <img src="<?= base_url('assets/img/menu/galeri/') ?><?= $g['gambar']; ?>" width=" 30" height="130" class="card-img-top">
                     </div>
                     <div class="foot">
                        <a href=" <?= base_url('adminhome/ubahgaleri/') . $g['id']; ?>" class=" badge badge-success">ubah</a>
                        <a href="<?= base_url('adminhome/hapusgaleri/') . $g['id']; ?>" class=" badge badge-danger" onclick="return confirm('hapus?')">hapus</a>
                     </div>
                  </div>
               </div>
               <?php $i++; ?>
            <?php endforeach; ?>
         </div>

      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class=" modal fade" id="newgaleriModal" tabindex="-1" aria-labelledby="newgaleriModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newgaleriModalLabel">Tambah Kegiatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?= form_open_multipart('adminhome/tambahgaleri'); ?>
         <div class="modal-body">
            <div class="form-group row">
               <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
               <div class="col-sm-10">
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="gambar" name="gambar">
                     <label class="custom-file-label" for="gambar">Pilih gambar</label>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-gradient" style="background-color:#00bfa5; color:white;">Tambah</button>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>