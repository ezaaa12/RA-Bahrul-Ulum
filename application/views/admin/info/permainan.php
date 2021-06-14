<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="row">
      <div class="col-lg-6">
         <div class="dropdown">
            <button class="btn btn-gradinet dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#00bfa5; color:white;">
               Sarana dan Fasilitas
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item" href="<?= base_url('admininfo/fasilitas') ?>">Fasilitas Sekolah</a>
               <a class="dropdown-item" href="<?= base_url('admininfo/permainan') ?>">Fasilitas Permainan</a>
            </div>
         </div>
      </div>
   </div>

   <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newMainanModal" style="background-color:#00bfa5; color:white; margin-top:20px;">Tambah Fasilitas Permainan</a>

   <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
         <?= validation_errors(); ?>
      </div>
   <?php endif; ?>

   <?= $this->session->flashdata('message'); ?>

   <div class="row">
      <?php $i = 1; ?>
      <?php foreach ($permainan as $p) : ?>
         <div class="col-sm-2">
            <div class="card" style="width: 10rem; text-align: center; margin-top:20px;">
               <img src="<?= base_url('assets/img/info/fasilitaspermainan/') ?><?= $p['gambar']; ?>" width=" 30" height="130" class="card-img-top">
               <div class="card-body">
                  <a href=" <?= base_url('admininfo/ubahpermainan/') . $p['id']; ?>" class=" badge badge-success">ubah</a>
                  <a href="<?= base_url('admininfo/hapuspermainan/') . $p['id']; ?>" class=" badge badge-danger" onclick="return confirm('hapus?')">hapus</a>
               </div>

            </div>
         </div>
         <?php $i++; ?>
      <?php endforeach; ?>
   </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class=" modal fade" id="newMainanModal" tabindex="-1" aria-labelledby="newMainanModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newMainanModalLabel">Tambah Fasilitas Permainan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?= form_open_multipart('admininfo/tambahpermainan'); ?>
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