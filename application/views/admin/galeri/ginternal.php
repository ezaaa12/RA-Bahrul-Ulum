<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="row">
      <div class="col-sm-2">
         <div class="dropdown">
            <button class="btn btn-gradinet dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#00bfa5; color:white;">
               Galeri Kegiatan
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item" href="<?= base_url('admingaleri/galeriinternal'); ?>">Kegiatan Internal</a>
               <a class="dropdown-item" href="<?= base_url('admingaleri/galerieksternal'); ?>">Kegiatan Eksternal</a>
            </div>
         </div>
      </div>
      <div class="col-sm-2">
         <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newInternalModal" style="background-color:#00bfa5; color:white; margin-top:1px;">Tambah Gambar</a>
      </div>
   </div>



   <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
         <?= validation_errors(); ?>
      </div>
   <?php endif; ?>

   <?= $this->session->flashdata('message'); ?>
   <div class="row">
      <?php $i = 1; ?>
      <?php foreach ($galeri as $gl) : ?>
         <div class="col-sm-2">
            <div class="card" style="width: 10rem; text-align: center; margin-top:20px;">
               <img src="<?= base_url('assets/img/galeri/internal/') ?><?= $gl['gambar']; ?>" width=" 30" height="130" class="card-img-top">
               <div class="card-body">
                  <a href=" <?= base_url('admingaleri/ubahinternal/') . $gl['id']; ?>" class=" btn btn-success"><i class="far fa-edit"></i></a>
                  <a href="<?= base_url('admingaleri/hapusinternal/') . $gl['id']; ?>" class=" btn btn-danger" onclick="return confirm('hapus?')"><i class="far fa-trash-alt"></i></a>
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
<div class=" modal fade" id="newInternalModal" tabindex="-1" aria-labelledby="newInternalModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newInternalModalLabel">Tambah Gambar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?= form_open_multipart('admingaleri/tambahinternal'); ?>
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